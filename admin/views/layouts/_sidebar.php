<?php
use kartik\widgets\SideNav;
// OR if this package is installed separately, you can use
// use kartik\sidenav\SideNav;
use yii\helpers\Url;
use kartik\icons\Icon;
Icon::map($this);  
?>
<aside class="aside bg-dark-700">
    <div class="simplebar-wrapper">
        <div data-pixr-simplebar>
            <div class="pb-6 pb-sm-0 position-relative">
                <!-- Mobile close btn-->
                <div class="cursor-pointer close-menu me-4 text-primary-hover transition-color disable-child-pointer position-absolute end-0 top-0 mt-3 pt-1 d-xl-none">
                    <i class="ri-close-circle-line ri-lg align-middle me-n2"></i>
                </div>
                <!-- / Mobile close btn-->

                <!-- Mobile Logo-->
                <div class="d-flex justify-content-center align-items-center py-3">
                    <a class="m-0" href="{{webRoot}}/index.html">
                        {{> navbar/logo }}
                    </a>
                </div>
                <!-- / Mobile Logo-->
                    <?php                 
                    echo SideNav::widget([
                        'type' => SideNav::TYPE_SECONDARY ,
                        'encodeLabels' => false,
                        'iconPrefix' => 'fas fa-',
                        'indMenuOpen' => '<i class="fas fa-angle-up"></i>',
                        'indMenuClose' => '<i class="fas fa-angle-down"></i>',
                        //'options'  => ['class' => 'list-unstyled mb-6 aside-menu'],
                        'heading' => '<i class="fas fa-cog"></i> Operations',
                        //'itemOptions' => ['class' => 'menu-item'],
                        'items' => [
                            // Important: you need to specify url as 'controller/action',
                            // not just as 'controller' even if default action is used.
                            //
                            // NOTE: The variable `$item` is specific to this demo page that determines
                            // which menu item will be activated. You need to accordingly define and pass
                            // such variables to your view object to handle such logic in your application
                            // (to determine the active status).
                            //
                            ['label' => 'Home', 'icon' => 'home', 'url' => ['/site/home'], 'active' => false,'linkOptions' => ['class' => 'menu-item'],'htmlOptions'=>['class'=>'d-flex align-items-center menu-link']],
                            ['label' => 'Books', 'icon' => 'book', 'items' => [
                                ['label' => '<span class="pull-right float-right float-end badge">10</span> New Arrivals', 'url' => ['/site/new-arrivals'], 'active' =>  false],
                                ['label' => '<span class="pull-right float-right float-end badge">5</span> Most Popular', 'url' => ['/site/most-popular'], 'active' =>  false],
                                ['label' => 'Read Online', 'icon' => 'cloud', 'items' => [
                                    ['label' => 'Online 1', 'url' => ['/site/online-1'], 'active' => false],
                                    ['label' => 'Online 2', 'url' => ['/site/online-2'], 'active' => false]
                                ]],
                                ],'htmlOptions'=>['class'=>'d-flex align-items-center menu-link'],
                                  'options' => ['class' =>'submenu']],
                            ['label' => '<span class="pull-right float-right float-end badge">3</span> Categories', 'icon' => 'tags', 'items' => [
                                ['label' => 'Fiction', 'url' => ['/site/fiction'], 'active' => false],
                                ['label' => 'Historical', 'url' => ['/site/historical'], 'active' => false],
                                ['label' => '<span class="pull-right float-right float-end badge">2</span> Announcements', 'icon' => 'bullhorn', 'items' => [
                                    ['label' => 'Event 1', 'url' => ['/site/event-1'], 'active' => false],
                                    ['label' => 'Event 2', 'url' => ['/site/event-2'], 'active' => false]
                                ]],
                            ]],
                            ['label' => 'Profile', 'icon' => 'user', 'url' => ['/site/profile'], 'active' => true],
                        ],
                    ]); 
                    ?>
                 
            </div>
        </div>
    </div>
</aside>       
