<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <?php
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($baseUrl.'/js/main.js');
        $cs->registerCssFile($baseUrl.'/css/main.css');
    ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="mainmenu" style="padding-bottom: 40px;">
        <?php
        $this->widget('bootstrap.widgets.TbNavbar', [
//            'type' => 'inverse',
//            'brand' => CHtml::encode(Yii::app()->name),
            'brand' => 'Главная страница',
            'brandUrl' => [
                'site/index'
            ],
            'fixed' => 'top',
            'fluid' => false,
            'collapse' => true,
            'htmlOptions' => [
                'class' => 'mainNavigation'
            ],
            'items' => [[ 'class' => 'bootstrap.widgets.TbMenu', 'items' => $this->menu,]]
        ]);
        ?>
    </div><!-- mainmenu -->

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links' => $this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
        2013&copy; Всі права захищені.
        Інформація є загальною, постійно поновлюється, за більш детальною інформацією звертатись в місцеві райдержадміністрації.
        Сайт не несе юридичної відповідальності за надану інформацію.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
