<?php

use app\admin\assets\MainAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

/**
 * @var yii\web\View $this
 */

$themeMazer = MainAsset::register($this);

$menuItems = []; //<iconify-icon icon="mdi:user-outline" style="color: #123;" width="20" rotate="0deg"></iconify-icon>
if (Yii::$app->user->isGuest) {
	$menuItems[] = [
		'label' =>  Html::tag(
			'span',
			'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1Z"></path></svg>',
			["class" => "d-inline-block", "tabindex" => "0", "data-bs-toggle" => "popover", "data-bs-trigger" => "hover focus", "data-bs-content" => "click to login!"]
		),
		'encode' => false,
		'url' => ['/site/login'],
		'linkOptions' => ['alt' => Yii::t('app', 'Login'), 'class' => ''],
	];
} else {

	$menuItems[] = [
		'label' => '<div class="user-menu d-flex">' . Yii::$app->user->identity->username . '</div>',
		'encode' => false,
		'linkOptions' => ['alt' => Yii::t('app', 'Welcome'), 'data-bs-title' => Yii::t('app', 'Welcome'), 'class' => 'nav-text d-flex'],
		'items' => [
			[
				'label' => Html::tag('span', Yii::t('app', 'Site Front')),
				'url' => ['/'],
				'encode' => false,
				'linkOptions' => [
					'data-method' => 'post',
					'alt' => Yii::t('app', 'Frontend'),
					'title' => Yii::t('app', 'Frontend'),
				],
			]
		]
	];
}

?>

<header class='mb-3'>
	<nav class="navbar navbar-expand navbar-light navbar-top">
		<div class="container-fluid">
			<a href="#" class="burger-btn d-block">
				<i class="bi bi-justify fs-3"></i>
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<?= Nav::widget([
					'options' => ['class' => "navbar-nav ms-auto mb-lg-0"],
					'items' => $menuItems,
				]); ?>
			</div>

	</nav>
</header>