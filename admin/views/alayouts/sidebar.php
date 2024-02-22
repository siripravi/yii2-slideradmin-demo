<?php

use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\Offcanvas;

use yii\bootstrap5\Accordion;

?>
<?php
/*Offcanvas::begin([
                    'placement' => Offcanvas::PLACEMENT_START,
                    'backdrop' => true,
                    'scrolling' => true
                ]);*/
?>
<aside class="aside bg-dark-700">
    <div class="simplebar-wrapper">
        <div data-pixr-simplebar>
            <div class="pb-6 pb-sm-0 position-relative">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                    <i class="fas fa-user-secret me-2"></i>Nyxta Admin
                </div>
                <?php
                /* echo Accordion::widget([
                          'items' => [
                             [
                                              'label' => 'Collapsible Group Item #1',
                                              'content' => yii\bootstrap5\Nav::widget([
                                                 'options' => ['class'=>'list-unstyled mb-6 aside-menu'],
                                                 'encodeLabels' => false,
                                                 'items' => [           
                                                     [
                                                         'label' => '<span class="me-2"><i class="ti-stats-up"></i></span><span>Categories</span>', 
                                                         'url' => ['/admin/products/category/index'], 
                                                         'linkOptions' => ['class' => 'd-flex align-items-center menu-link']
                                                     ],
                                                 ]
                                                 ]),    
                                              // open its content by default
                                             // 'contentOptions' => ['class' => 'out']
                             ]
                          ]
                     ]);*/
                ?>

                <?php
                echo \yii\bootstrap5\Nav::widget([
                    'options' => ['class' => 'list-group mb-6 aside-menu'],

                    'encodeLabels' => false,
                    //'itemOptions' => [],
                    'items' => [
                        /*[
                            'label' => 'Dropdown',
                            'items' => [
                                    ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                                     '<div class="dropdown-divider"></div>',
                                      '<div class="dropdown-header">Dropdown Header</div>',
                                       ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
                                      ],
                           ], */
                        [
                            'label' => '<span class="me-2"><i class="ti-stats-up"></i></span><span>Categories</span>',
                            'url' => ['/admin/products/category/index'],
                            'linkOptions' => ['class' => 'menu-item'],
                            'htmlOptions' => ['class' => 'list-group-item list-group-item-action']
                        ],
                        [
                            'label' => '<span class="me-2"><i class="fas fa-list"></i></span><span>Products</span>',
                            'url' => ['/admin/products/default/index'],
                            'linkOptions' => ['class' => 'menu-item'],
                            'htmlOptions' => ['class' => 'list-group-item list-group-item-action']
                        ],
                        [
                            'label' => '<span class="me-2"><i class="ti-stats-up"></i></span><span>Groups</span>',
                            'url' => ['/admin/products/complect/index'],
                            'linkOptions' => ['class' => 'menu-item'],
                            'htmlOptions' => ['class' => 'list-group-item list-group-item-action']
                        ],
                        [
                            'label' => '<span class="me-2"><i class="ti-stats-up"></i></span><span>Slider Images</span>',
                            'url' => ['/admin/slider/'],
                            'linkOptions' => ['class' => 'menu-item'],
                            'htmlOptions' => ['class' => 'list-group-item list-group-item-action']
                        ],
                        [
                            'label' => '<span class="me-2"><i class="fas fa-layer-group"></i></span><span>Customers</span>',
                            'url' => ['/admin/buyer/index'],
                            'linkOptions' => ['class' => 'menu-item'],
                            'htmlOptions' => ['class' => 'list-group-item list-group-item-action']
                        ],

                        [
                            'label' => '<span class="me-2"><i class="fas fa-layer-group"></i></span><span>Admin Users</span>',
                            'url' => ['/admin/user/index'],
                            'linkOptions' => ['class' => 'menu-item'],
                            'htmlOptions' => ['class' => 'list-group-item list-group-item-action']
                        ],

                        [
                            'label' => '<span class="me-2"><i class="fa fa-ravelry"></i></span><span>Login</span>',
                            'url' => ['site/login'],
                            'visible' => Yii::$app->user->isGuest,
                            'linkOptions' => ['class' => 'd-flex align-items-center menu-link'],
                        ],


                    ],
                ]); ?>
            </div>
        </div>
    </div>
</aside>
<!--?php Offcanvas::end(); ?-->