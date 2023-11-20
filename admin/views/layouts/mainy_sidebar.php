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
                        Admin
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
            echo \yii\bootstrap5\Nav::widget([
                'options' => ['class' => 'menu'],
                'encodeLabels' => false,              
                'items' => [
                    "<li class='sidebar-title'>Slider Admin<li>",
                    [
                        'label' => '<i class="bi bi-card-text"></i><span>Slider</span>',
                        'url' => ['/admin/slider'],
                        'linkOptions' => ['class' => 'sidebar-link'],
                        'htmlOptions' => ['class' => 'sidebar-item']
                    ],                  

                ],
            ]); ?>
        </div>
    </div>
</div>