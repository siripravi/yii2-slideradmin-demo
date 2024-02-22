<?php

use app\admin\assets\MainAsset;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 */

$themeMazer = MainAsset::register($this);
?>

<?php $this->registerJs(<<<'JS'
	/* auto active sidebar */
	$('#sidebar ul.menu a').each(function() {
		let href = this.getAttribute('href');
		if (href === '#') return;
		if (this.href === window.location.href) {
			$(this).parentsUntil('#sidebar', 'li').each(function() {
				$(this).addClass('active').children('ul').addClass('submenu-open');
			});
		}
	});
JS) ?>

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="<?= '/admin' ?>">
                        SliderAdmin
                    </a>
                </div>
                <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                        <label class="form-check-label"></label>
                    </div>

                </div>

                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <?php
          /*  echo \yii\bootstrap5\Nav::widget([
                'options' => ['class' => 'menu'],
                'encodeLabels' => false,
                'items' => [
                    "<li class='sidebar-item active'>
					<a href='", Url::toRoute(['/site/index']) . "' class='sidebar-link'>
						<i class='bi bi-grid-fill'></i>
						<span>Dashboard</span>
					</a>
				</li>",
                    [
                        'label' => '<i class="bi bi-grid-1x2-fill"></i>&nbsp;
                                        <span>Dropdown List</span>
                                    ',
                        'items' => [
                            ['label' => 'Action', 'url' => '#','linkOptions' => ['class' => 'submenu-item']],
                            ['label' => 'Another action', 'url' => '#','linkOptions' => ['class' => 'submenu-item']],
                            '<div class="dropdown-divider"></div>',
                            ['label' => 'Separated link', 'url' => '#','linkOptions' => ['class' => 'submenu-item']],
                           
                        ],
                    
                    ],
                    [
                        'label' => '<i class="bi bi-card-text"></i><span>Slider</span>',
                        'url' => ['/admin/slider'],
                        'linkOptions' => ['class' => 'sidebar-link'],
                        'htmlOptions' => ['class' => 'sidebar-item'],
                        
                    ],

                ],
            ]);  */?>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item active">
                    <a href="<?= Url::toRoute(['/admin']) ?>" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" target="_blank">
                        <i class="bi bi-life-preserver"></i>
                        <span>Slider Menu</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">Vertical Navbar</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">Horizontal Menu</a>
                        </li>

                        <li class="submenu-item">
                            <a href="<?= Url::current(['layout' => 'auth', 'render' => '#']) ?>" class="submenu-link">LogIn</a>
                        </li>
                        <li class="submenu-item">
                            <a href="<?= Url::current(['layout' => 'auth', 'render' => '#']) ?>" class="submenu-link">SignUp</a>
                        </li>
                        <li class="submenu-item">
                            <a href="<?= Url::current(['layout' => 'auth', 'render' => '#']) ?>" class="submenu-link">Forgot Password</a>
                        </li>
                        <li class="submenu-item">
                            <a href="<?= Url::current(['layout' => 'auth', 'render' => '#']) ?>" class="submenu-link">Reset Password</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Raise Support</li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" target="_blank">
                        <i class="bi bi-life-preserver"></i>
                        <span>Documentation</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" target="_blank">
                        <i class="bi bi-puzzle"></i>
                        <span>Contribute</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" target="_blank">
                        <i class="bi bi-cash"></i>
                        <span>Donate</span>
                    </a>
                </li>
            </ul>
        </div>
       
    </div>
</div>