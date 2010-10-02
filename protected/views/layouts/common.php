<?php
$cs = Yii::app()->clientScript;
$base = Yii::app()->request->baseUrl;
$cs->registerCssFile("$base/styles/html5reset.css");
$cs->registerCssFile("$base/styles/font-face.css");
$cs->registerCssFile("$base/styles/main.css");
$cs->registerLinkTag(
	'alternate',
	'application/atom+xml',
	$this->createUrl('news/feed')
);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="shortcut icon" href="<?php echo $base; ?>/favicon.ico" type="image/x-icon" />
	<!--[if lt IE 9]>
	<script src="<?php echo $cs->appendTimestamp($base . '/scripts/html5shiv.js'); ?>"></script>
	<script src="<?php echo $cs->appendTimestamp($base . '/scripts/ie9.js'); ?>"></script>
	<![endif]-->
</head>
<body>
	<header id="main-header">
		<hgroup>
			<h1><a href="<?php echo Yii::app()->homeUrl; ?>">Школа системной соционики</a></h1>
			<h2>Практика — критерий истины</h2>
		</hgroup>
	</header>
	<nav id="major-navigation">
		<?php $this->widget('zii.widgets.CMenu', array(
			'items' => $this->majorMenu,
			'activateItems' => false,
		)); ?>
	</nav>
	<div id="content-area">
		<?php echo $content; ?>
	</div>
<?php $this->widget('GoogleAnalytics'); ?>
</body>
</html>