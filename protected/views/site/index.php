<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<?php $this->beginWidget(
    'bootstrap.widgets.TbHeroUnit',
    array(
        'heading' => 'Інформаційно-пошукова система Водні об’єкти Полтавської області',
    )
); ?>

    <p>м. Полтава, вул. За Рудкою, 35,
        +380 (352) 52-64-22
        water@poltavasp.te.ua</p>

    <p><?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'type' => 'primary',
                'size' => 'large',
                'label' => 'Узнать больше',
            )
        ); ?></p>

<?php $this->endWidget(); ?>

<div style="text-align:center; width:729px; margin-left:auto; margin-right:auto;">
    <?php echo CHtml::image('/images/poltava_regions.png', 'poltava region map', [
        'id'     => 'img1',
        'usemap' => '#mmap',
        'border' => 0,
        'width'  => 729,
        'height' => 600,
    ]); ?>

    <map id="mmap" name="mmap">
        <area id="grebinskiy" shape="poly" coords="19,122,27,103,34,115,55,103,72,111,85,112,98,123,109,140,122,144,107,161,93,184,76,195,68,189,59,171,51,167,40,147,46,139,"                                           href="http://poltava-lakes.local/1" alt="" title="" />
        <area shape="poly" coords="19,121,26,100,34,112,51,103,70,111,86,112,96,121,107,140,123,144,120,136,124,123,132,101,152,81,157,58,122,60,93,69,84,51,73,52,55,42,34,58,34,67,15,67,5,90,12,113," href="http://poltava-lakes.local/2"  alt="" title="" />
        <area shape="poly" coords="127,122,126,110,130,98,139,100,152,77,158,58,180,39,188,46,204,58,205,72,218,89,227,105,212,136,190,139,169,126,150,126,137,132,"                                     href="http://poltava-lakes.local/3"  alt="" title="" />
    </map>

    <div style="text-align:center; font-size:12px; font-family:verdana; margin-left:auto; margin-right:auto; width:729px;">
        <a style="text-decoration:none; color:black; font-size:12px; font-family:verdana;" href="http://poltava-lakes.local/2" title="Untitled">Пирятинский</a>
        | 	<a style="text-decoration:none; color:black; font-size:12px; font-family:verdana;" href="http://www.image-maps.com/1" title="Untitled">Гребинскiвський</a>
        | 	<a style="text-decoration:none; color:black; font-size:12px; font-family:verdana;" href="http://www.image-maps.com/3" title="Untitled">Чорнухинсткий</a>
    </div>

</div>