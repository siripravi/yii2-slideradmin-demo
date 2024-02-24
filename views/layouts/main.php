<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;
AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100" data-bs-theme="dark">
    <?php $this->beginBody() ?>
    <div style="margin-top:2px;">
    <?php echo $this->render("_topNav"); ?>
    </div>
    <header id="header" style="margin-top:4px;">
        <?php
        NavBar::begin([
            'brandLabel' => "",//Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark']
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav pull-right'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
                [
                    'label' => Yii::t('app', 'Mega Menu'),
                    //'url' => ['/category/index'],
                    'url' => ["#"], //nav-link dropdown-toggle show 
                    'options' => ['class' => 'has-megamenu'],
                    //class="dropdown-toggle" data-toggle="dropdown"
                    'linkOptions' => ['class' => 'dropdown-toggle', 'data-bs-auto-close' => 'outside', 'data-bs-toggle' => 'dropdown'],
                    // 'active' => in_array(Yii::$app->controller->id, ['category', 'product']),
                    'items' => [
                        $this->render("_mega")
                    ]
                ],
              /*  Yii::$app->user->isGuest
                    ? ['label' => 'Login', 'url' => ['/site/login']]
                    : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>', */
                    ['label' => 'Admin', 'url' => ['/admin']],             
            ]
        ]);
       
        NavBar::end();  
        ?>
       
    </header>
   
    <main id="main" class="flex-shrink-0" role="main" style="margin-top:13px;">
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])) : ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <div class="row text-muted">
                <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
                <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>