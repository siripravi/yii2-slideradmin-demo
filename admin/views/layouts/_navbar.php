<?php

use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use app\admin\models\Order;
use app\admin\models\Question;
use app\admin\models\Review;
use yii\widgets\Breadcrumbs;
?>
<div class="row align-items-start">
    <div class="col">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Dashboard</h2>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>            
        </nav>
    </div>
    <div class="col">
	    <?php
            NavBar::begin([
                'options' => [
                    'class' => 'main-header navbar navbar-expand navbar-secondary navbar-dark',
                ],
            ]);
         

            if ($unread = Order::unread()) {
                $unread_order = ' <span class="badge badge-danger">' . $unread . '</span>';
            } else {
                $unread_order = '';
            }
            

    echo Nav::widget([
        'options' => ['class' => 'navbar navbar-expand-lg bg-light'],
        'encodeLabels' => false,
        'items' => [           
            ['label' => Yii::t('app', 'Customers'), 'url' => ['/admin/buyer/index']],
            ['label' => Yii::t('app', 'Users'), 'url' => ['/admin/user/index']],
         
            ['label' => Yii::t('app', 'Shop Data'), 'url' => '#', 'items' => [
                ['label' => Yii::t('app', 'Currencies'), 'url' => ['/admin/products/currency/index']],
                ['label' => Yii::t('app', 'Units'), 'url' => ['/admin/products/unit/index']],
                ['label' => Yii::t('app', 'Upload price'), 'url' => ['/admin/excel/index']],
                ['label' => Yii::t('app', 'Delivery methods'), 'url' => ['/admin/delivery/index']],
                ['label' => Yii::t('app', 'Payment methods'), 'url' => ['/admin/payment/index']],
            ]],
            ['label' => Yii::t('app', 'Catalog Data'), 'url' => '#', 'items' => [
                ['label' => Yii::t('app', 'Brands'), 'url' => ['/admin/products/brand/index']],                
                ['label' => Yii::t('app', 'Statuses'), 'url' => ['/admin/products/product-status/index']],
            ]],
          
               /* ['label' => Yii::t('app', 'LiqPay Log'), 'url' => ['/cart/liqpay-log/index']],
                ['label' => Yii::t('app', 'Wfp Log'), 'url' => ['/cart/wfp-log/index']],*/ 		
        ]
           ]);
    NavBar::end();
    ?>
    </div>
    <div class="col">
        <div class="navbar" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                             role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-user me-2"></i>John Doe
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>        
        </div>   
    </div>
</div>