<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap5\Breadcrumbs;

app\admin\MainAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

$assetDir = "";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>

<body>
	<?php $this->beginBody() ?>
	<div id="app">
		<?= $this->render('mainy_sidebar') ?>

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
