<?php
use app\admin\widgets\MenuWidget;
use app\admin\assets\MainAsset;
?>

<?php
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
<div class="sidebar-menu">
<?php    

echo MenuWidget::widget([
    'options' => [
        'ulClass' => "menu navbar-nav bg-gradient-primary sidebar sidebar-dark accordion",
        'ulId' => "accordionSidebar"
    ], //  optional
    'brand' => [
        'url' => ['/'],
        'content' => <<<HTML
            <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>        
HTML
    ],
    'items' => [
        [
            'label' => 'Menu 1',
            'url' => ['/menu1'], //  Array format of Url to, will be not used if have an items
            'icon' => 'fas fa-fw fa-tachometer-alt', // optional, default to "fa fa-circle-o
            'visible' => true, // optional, default to true
             'linkOptions' => [
                 'class' => 'sidebar-menu',
             ] // optional
        ],
        [
            'type' => 'divider', // divider or sidebar, if not set then link menu
            // 'label' => '', // if sidebar we will set this, if divider then no

        ],
        [
            'label' => 'Shop Catalog',
            // 'icon' => 'fa fa-menu', // optional, default to "fa fa-circle-o
            'visible' => true, // optional, default to true
            // 'subMenuTitle' => 'Menu 2 Item', // optional only when have submenutitle, if not exist will not have subMenuTitle
            'items' => [
                [
                    'label' => 'Categories',
                    'url' => ['/admin/catalog/category'], //  Array format of Url to, will be not used if have an items
                ],
                [
                    'label' => 'Products',
                    'url' => ['/admin/catalog/product'], //  Array format of Url to, will be not used if have an items
                ],
            ]
        ],
        
        [
            'label' => 'Menu 3',
            'visible' => true, // optional, default to true
            // 'subMenuTitle' => 'Menu 3 Item', // optional only when have submenutitle, if not exist will not have subMenuTitle
            'items' => [
                [
                    'label' => 'Menu 3 Sub 1',
                    'url' => ['/menu21'], //  Array format of Url to, will be not used if have an items
                ],
                [
                    'label' => 'Menu 3 Sub 2',
                    'url' => ['/menu22'], //  Array format of Url to, will be not used if have an items
                ],
            ]
        ],
    ]
]);

?>
</div>
</div>
</div>