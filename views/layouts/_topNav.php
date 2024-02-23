<?php

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use siripravi\shopcart\widgets\CartIconWidget;
?>
<?php
$menuItems = []; //<iconify-icon icon="mdi:user-outline" style="color: #123;" width="20" rotate="0deg"></iconify-icon>
if (Yii::$app->user->isGuest) {
    $menuItems[] = [
        'label' =>  Html::tag(
            'span',
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1Z"></path></svg>',
            ["class" => "d-inline-block", "tabindex" => "0", "data-bs-toggle" => "popover", "data-bs-trigger" => "hover focus", "data-bs-content" => "click to login!"]
        ),
        'encode' => false,
        'url' => ['/user/login'],
        'linkOptions' => ['alt' => Yii::t('app', 'Login'), 'class' => ''],
    ];
} else {
    $menuItems[] = [
        'label' => Yii::t('app', 'Manage users'),
        'url' => ['/user/index'],
        'visible' => \Yii::$app->user->can('manage_users'),
        'items' => []
    ];
    $menuItems[] = [
        'label' => Html::img(
            \Yii::$app->user->identity->getAvatarImage(),
            ['alt' => Yii::$app->user->identity->username, 'class' => 'rounded-circle border-2', 'width' => 38]
        ),
        'encode' => false,
        'linkOptions' => ['alt' => Yii::t('app', 'Welcome'), 'data-bs-title' => Yii::t('app', 'Welcome'), 'class' => ''],
        'items' => [
            [
                'label' => Html::tag('span', Yii::$app->user->identity->username),
                'url' => ['/user/settings/profile'],
                'encode' => false,
            ],
            [
                'label' => Html::tag('span', Yii::t('app', 'Account Settings')),
                'encode' => false,
                'url' => ['/user/settings/account'],
                'linkOptions' => ['alt' => Yii::t('app', 'Account Settings'), 'title' => Yii::t('app', 'Account Settings')],
            ],
            [
                'label' => Html::tag('span', Yii::t('app', 'Addresses')),
                'encode' => false,
                'url' => ['/user/settings/addresses'],
                'linkOptions' => ['alt' => Yii::t('app', 'Addresses'), 'title' => Yii::t('app', 'Addresses')],
            ],
            [
                'label' => Html::tag('span', Yii::t('app', 'Logout')),
                'url' => ['/user/logout'],
                'encode' => false,
                'linkOptions' => [
                    'data-method' => 'post',
                    'alt' => Yii::t('app', 'Logout'),
                    'title' => Yii::t('app', 'Logout'),
                ],
            ]
        ]
    ];
}

?>
<!-- Begin Top Nav -->
<div class="container-fluid px-0 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-4 text-center bg-success py-3">
            <div class="d-inline-flex align-items-center justify-content-center">
                <i class="bi bi-envelope fs-1 text-primary me-3"></i>
                <div class="text-start">
                    <h6 class="text-uppercase mb-1">Email Us</h6>
                    <span>info@example.com</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center bg-success border-inner py-3">
            <div class="d-inline-flex align-items-center justify-content-center">
                <a href="index.html" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-dark me-3"></i>CakeZone</h1>
                </a>
            </div>
        </div>
        <div class="col-lg-4 text-center bg-success py-3 col-auto">
            <?= Nav::widget([
                'options' => ['class' => "top-nav d-inline-flex ps-4"],
                'items' => $menuItems,
            ]); ?>

            <div class="d-inline-flex ps-4">
                <?= Html::a('<img src="/image/site/flag-us.svg">', Url::current(['lang' => 'en']), ['class' => ['btn btn-sm', Yii::$app->language === 'en' ? '' : ''], 'hreflang' => 'us-EN', 'rel' => 'nofollow']) ?>
                <?= Html::a('<img src="/image/site/flag-bha.svg">', Url::current(['lang' => 'hi']), ['class' => ['btn btn-sm', Yii::$app->language === 'hi' ? '' : ''], 'hreflang' => 'hi-IN', 'rel' => 'nofollow']) ?>
            </div>
            <div class="col-lg-auto text-center text-lg-left header-item-holder d-inline-flex ps-4">
                <!--= CartIconWidget::widget(); ?-->
                <a id="cart-icon" class="border border-circle cart-icon header-item" title="You have items in cart" href="/cart/bag/index">
                    <span class="fa-layers fa-fw" style="background:white"><i class="fa-2x fas fa-shopping-cart"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End Top Nav -->