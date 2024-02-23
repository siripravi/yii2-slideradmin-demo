<?php

namespace app\modules\userauth\models;

use app\models\Token;

use siripravi\authhelper\helpers\Password;
use siripravi\authhelper\models\User as BaseModel;

/**
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 *
 * @property-read UserMailer $mailer
 */
class User extends BaseModel
{
    //public $mailer;

    /** @inheritdoc */
    public function afterSave($insert, $changedAttributes)
    {
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'username'          => \Yii::t('app', 'Username'),
            'email'             => \Yii::t('app', 'Email'),
            'registration_ip'   => \Yii::t('app', 'Registration ip'),
            'unconfirmed_email' => \Yii::t('app', 'New email'),
            'password'          => \Yii::t('app', 'Password'),
            'created_at'        => \Yii::t('app', 'Registration time'),
            'confirmed_at'      => \Yii::t('app', 'Confirmation time'),
        ];
    }

    /** @inheritdoc */
    public function rules()
    {
        return [
            // username rules
            'usernameRequired' => ['username', 'required', 'on' => ['register', 'create', 'connect', 'update']],
            'usernameMatch'    => ['username', 'match', 'pattern' => static::$usernameRegexp],
            'usernameLength'   => ['username', 'string', 'min' => 3, 'max' => 255],
            'usernameUnique'   => [
                'username',
                'unique',
                'message' => \Yii::t('app', 'This username has already been taken')
            ],
            'usernameTrim'     => ['username', 'trim'],

            // email rules
            [['email'], 'required'],
            'emailPattern'  => ['email', 'email'],
            'emailLength'   => ['email', 'string', 'max' => 255],
            'emailUnique'   => [
                'email',
                'unique',
                'message' => \Yii::t('app', 'This email address has already been taken')
            ],
            'emailTrim'     => ['email', 'trim'],

            // user group
            [['user_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserGroup::class, 'targetAttribute' => ['user_group_id' => 'id']],

            // password rules
            'passwordRequired' => ['password', 'required', 'on' => ['register']],
            'passwordLength'   => ['password', 'string', 'min' => 6, 'max' => 72, 'on' => ['register', 'create']],
        ];
    }

    /**
     * This method is used to register new user account. If Module::enableConfirmation is set true, this method
     * will generate new confirmation token and use mailer to send it to the user.
     *
     * @return integer | bool If true - returns user id
     * @param null|string $return
     */
    public function register($return = null)
    {
        if ($this->getIsNewRecord() == false) {
            throw new \RuntimeException('Calling "' . __CLASS__ . '::' . __METHOD__ . '" on existing user');
        }

        $transaction = $this->getDb()->beginTransaction();

        try {
            $this->confirmed_at = $this->module->enableConfirmation ? null : time();
            $this->password     = $this->module->enableGeneratingPassword ? Password::generate(8) : $this->password;

            $this->trigger(self::BEFORE_REGISTER);

            if (!$this->save()) {
                $transaction->rollBack();
                return false;
            }

            if ($this->module->enableConfirmation) {
                /** @var Token $token */
                $token = \Yii::createObject(['class' => Token::class, 'type' => Token::TYPE_CONFIRMATION]);
                if (!empty($return)) $token->returnUrl = $return;
                $token->link('user', $this);
            }

            $this->mailer->sendWelcomeMessage($this, isset($token) ? $token : null);
            $this->trigger(self::AFTER_REGISTER);

            $transaction->commit();

            return $this->id;
        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
            $transaction->rollBack();
            \Yii::warning($e->getMessage());
            return false;
        }
    }

    public function getPartnerStatus()
    {
        if (!\Yii::$app->user->isGuest) {
            $partnerRequest = PartnerRequest::find()->where(['sender_id' => $this->id])->one();
            if (!empty($partnerRequest)) {
                return $partnerRequest->moderation_status;
            } else return false;
        } else return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserGroup()
    {
        return $this->hasOne(UserGroup::class, ['id' => 'user_group_id']);
    }

    /**
     * @return UserMailer
     * @throws \yii\base\InvalidConfigException
     */
    protected function getMailer()
    {
        return \Yii::$container->get(\siripravi\authhelper\Mailer::class);
        //return \Yii::$app->mailer;
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function getAvatarImage()
    {
        return \Yii::getAlias('@web/img/avatar/') . $this->id . '/' . $this->profile->avatar;
    }

    /**
     * Confirms the user by setting 'confirmed_at' field to current time.
     */
    public function confirm()
    {
        $this->trigger(self::BEFORE_CONFIRM);
        $result = (bool) $this->updateAttributes(['confirmed_at' => time()]);
        $this->trigger(self::AFTER_CONFIRM);
        return $result;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(get_class(\Yii::createObject(Profile::class)), ['user_id' => 'id']);
    }


    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'username' => 'text',
            'password' => 'password',
            'email' => 'text'
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['username', 'email']],
            //  [['create'], ['username', 'password']],
            [['update'], ['username']],
            ['delete', false],
        ];
    }
}
