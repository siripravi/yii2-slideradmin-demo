<?php
use yii\helpers\Html;
use app\admin\assets\MainAsset;
use yii\web\View;

/* @var $this View */
/* @var $content string */
$themeMazer = MainAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

        <!-- <link rel="stylesheet" type="text/css"
              href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700&display=swap"/> -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- FOR CHART -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
        <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
	<?php $this->beginBody() ?>
	<div id="app">
		<?= $this->render('sidebar') ?>

		<div id="main" class='layout-navbar navbar-fixed'>
			<?= $this->render('mainy_header') ?>

			<div id="main-content">
				<?= $this->render('mainy_content', compact('content')) ?>

				<?= $this->render('mainy_footer') ?>
			</div>
		</div>
	</div>

	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>