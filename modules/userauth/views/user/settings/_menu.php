<?php

/**
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 *
 * @var app\modules\user\models\User $user
 */

use yii\helpers\Html;
use yii\widgets\Menu;


$user = Yii::$app->user->identity;
$networksVisible = count(Yii::$app->authClientCollection->clients) > 0;

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?= ($user->profile->name . ' ' . $user->profile->surname) ? $user->profile->name . ' ' . $user->profile->surname : $user->email ?>
        </h3>
    </div>
    <div class="panel-body">
        <?php $items = [
            ['label' => Yii::t('app', 'Viewed products'), 'url' => ['/shop/viewed-product/list']],
            ['label' => Yii::t('app', 'Favorite products'), 'url' => ['/shop/favorite-product/list']],
            ['label' => Yii::t('app', 'Profile'), 'url' => ['/user/settings/profile']],
            ['label' => Yii::t('app', 'Addresses'), 'url' => ['/user/settings/addresses']],
            ['label' => Yii::t('app', 'Account'), 'url' => ['/user/settings/account']],
            [
                'label' => Yii::t('app', 'Networks'),
                'url' => ['/user/settings/networks'],
                'visible' => $networksVisible
            ],
        ];
        if (!Yii::$app->user->can('ProductPartner')) $items[] = ['label' => Yii::t('app', 'Become a partner'), 'url' => ['/shop/partner-request/send']];
        ?>
        <?= Menu::widget([
            'options' => [
                'class' => 'nav nav-pills nav-stacked',
            ],
            'items' => $items,
        ]);

        ?>
    </div>
</div>
<?= Html::beginForm(['/user/logout'], 'post')

    . Html::submitButton(
        Html::tag('i', '', ['class' => 'fa fa-sign-out'])
            . \Yii::t('app', 'Logout'),
        ['class' => 'btn btn-link']
    )
    . Html::endForm();
?>