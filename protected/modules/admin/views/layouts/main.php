<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($baseUrl.'/js/admin_main.js');
        $cs->registerCssFile($baseUrl.'/css/admin.css');
    ?>
</head>

<body>
<div id="allpage">
    <div class="container" id="page">

        <div id="header">
            <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
        </div><!-- header -->

        <div id="mainmenu">
            <?php
            $this->widget('bootstrap.widgets.TbNavbar', [
    //            'type' => 'inverse',
                'brand' => $this->module->name,
                'brandUrl' => [
                    '/admin/index/index'
                ],
                'fixed' => 'top',
                'fluid' => false,
                'collapse' => true,
                'htmlOptions' => [
                    'class' => 'mainNavigation'
                ],
                'items' => [[ 'class' => 'bootstrap.widgets.TbMenu', 'items' => $this->module->menu,]]
            ]);
            ?>
        </div><!-- mainmenu -->
        <br />
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget(
                'bootstrap.widgets.TbBreadcrumbs',
                array(
                    'links' => $this->breadcrumbs,
                    'homeLink' => CHtml::link('Главная', ['/admin']),
                )
            ); ?><!-- breadcrumbs -->
        <?php endif?>

        <?php echo $content; ?>

        <div class="clear"></div>
        <br />
        <div class="modal-footer">
            Copyright &copy; <?php echo date('Y'); ?> by Poltava Likes.<br/>
            All Rights Reserved.<br/>
        </div><!-- footer -->

    </div><!-- page -->
</div>
</body>
</html>
