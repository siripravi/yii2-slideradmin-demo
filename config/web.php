<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'language' => 'hi',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        /*'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'xElL896xtETlBBwfxqmdZBkNvkeBeTgy',
        ],*/
        'request' => [
            'class' => 'app\components\SiteRequest',
            'cookieValidationKey' => 'I-mmzHGFYAx9EnbueCBRo4W4HQBKHA_-',
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
      /*  'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],*/
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'class' => 'app\components\SiteUrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'image/<size:[0-9a-z\-]+>/<name>.<extension:[a-z]+>' => 'admin/image/default/index',
                // 'file/<name>.<extension:[a-z]+>' => 'admin/image/default/file',                
                $params['images_dir'] . '/<dir:[a-zA-Z0-9-_\/]+>/<action:(small|medium|large)>/<name:[a-zA-Z0-9-_\.]+>' => 'image/<action>',
                $params['files_dir'] . '/<dir:[a-zA-Z0-9-_\/]+>/<name:[a-zA-Z0-9-_\.]+>' => 'file/open',
            ],
        ],
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => app\modules\userauth\models\User::class,
            'enableAutoLogin' => true,
            'enableSession' => true,
            'identityCookie' => [
                'name'     => '_frontendIdentity',
                'path'     => '/',
                'httpOnly' => true,
            ],
            'on afterLogin' => function () {
                //  if (Yii::$app->cart->saveToDataBase) Yii::$app->cart->transportSessionDataToDB();
            },
            'on afterConfirm' => function () {
                //  if (Yii::$app->cart->saveToDataBase) Yii::$app->cart->transportSessionDataToDB();
            },
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules'  =>  [
        'slider' => [
            'class' => 'siripravi\slideradmin\Module',
        ],
        'userauth' => [
            'class' => 'app\modules\userauth\Module',
        ],
        'catalog' => [
            'class' => 'app\modules\catalog\Module',
        ],
       
        'nyiixta' => [
            'class' => 'siripravi\nyiixta\Module',
        ],
        'user' => [
            'class' => 'siripravi\userhelper\Module',
         //   'layout' => '@app/themes/cakeBaker/views/layouts/auth',
            'modelMap' => [
                'RegistrationForm' => app\modules\userauth\models\RegistrationForm::class,
                'RecoveryForm' => app\modules\userauth\models\RecoveryForm::class,
                'LoginForm' => app\modules\userauth\models\LoginForm::class,
                'SettingsForm' => app\modules\userauth\models\SettingsForm::class,
                'Profile' => app\modules\userauth\models\Profile::class,
                'User' => app\modules\userauth\models\User::class,

            ],
            'controllerMap' => [
                'registration' => app\modules\userauth\controllers\frontend\RegistrationController::class,
                'settings' => app\modules\userauth\controllers\frontend\SettingsController::class,
                'security' => app\modules\userauth\controllers\frontend\SecurityController::class,
                'recovery' => app\modules\userauth\controllers\frontend\RecoveryController::class
            ],
            'mailer' => [
                'viewPath' => '@app/views/user/mail',
                'sender'                => 'no-reply@myhost.com', // or ['no-reply@myhost.com' => 'Sender name']
                'welcomeSubject'        => 'Welcome subject',
                'confirmationSubject'   => 'Confirmation subject',
                'reconfirmationSubject' => 'Email change subject',
                'recoverySubject'       => 'Recovery subject',
            ],
            // 'as frontend' => app\modules\user\filters\FrontendFilter::class,
            // 'enableFlashMessages' => false
        ],
        'admin' => [
            'class' => 'app\admin\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'modules' => [
                'slider' => [
                    'class' => 'siripravi\slideradmin\Module',
                ],
                'nyiixta' => [
                    'class' => 'siripravi\nyiixta\Module',
                ],
                'catalog' => [
                    'class' => 'app\modules\catalog\Module',
                ],
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
