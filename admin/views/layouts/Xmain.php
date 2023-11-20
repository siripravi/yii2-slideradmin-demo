<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap5\Breadcrumbs;
\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
//\hail812\adminlte3\assets\AdminLteAsset::register($this);
//app\admin\assets\ThemeAsset::register($this);
app\admin\assets\MainAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

$assetDir = "";//Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

//$publishedRes = Yii::$app->assetManager->publish('@vendor/hail812/yii2-adminlte3/src/web/js');
//$this->registerJsFile($publishedRes[1].'/control_sidebar.js', ['depends' => '\hail812\adminlte3\assets\AdminLteAsset']);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<!-- Head -->
<?= $this->render('head', ['assetDir' => $assetDir]) ?>

<body class="">

    <!-- Navbar-->
    <?= $this->render('navbar', ['assetDir' => $assetDir]) ?>
    <!-- {{> (config config.partials.navbar)
        configClassList=config.classes.navbar
        classList=""
    }} -->
    <!-- / Navbar-->

    <!-- Page Content -->
    <main id="main">

        <!-- Content-->
        <section class="container-fluid">

            <!-- Breadcrumbs-->
            <!--?= $this->render('breadcrumbs', ['assetDir' => $assetDir]) ?-->
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <!--{{> content/breadcrumbs}}  -->
            <!-- / Breadcrumbs-->

           <?= $content; ?>
            <!-- Footer -->
            <!--{{> (config config.partials.footer)
            configClassList=config.classes.footer
            classList=""
        }}-->
            <!-- / Footer-->

        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->

    <!-- Page Aside-->
    <?= $this->render('sidebar', ['assetDir' => $assetDir]) ?>
    <!--{{> aside/aside }}  -->
    <!-- / Page Aside-->

    <!-- Theme JS -->
    <!--{{> footer/scripts }}-->
    <script>
       /* var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };*/
    </script>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>