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

<div class="bs-search">
    <?php
        /** @var TbActiveForm $form */
        $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm',
            [
                'id' => 'searchForm',
                'type' => 'inline',
                'action' => '/site/search',
                'htmlOptions' => ['class' => 'well'],
            ]
        );
    ?>
    <div class="input-prepend">
        <span class="add-on">
            <i class="icon-search"></i>
        </span>
        <input class="input-medium span9" placeholder="Что ищем?" name="SearchForm[searchText]" id="SearchForm_SearchText" type="text" value="<?php echo $model['searchText']; ?>">
    </div>
    <button class="btn btn-danger" id="yw1" type="submit" name="yt0">Поиск</button>
    <hr />

    <h4>ОБ'ЄКТИ:</h4>
    <?php echo $form->radioButtonListRow(
        $model,
        'objects',
        [
            2 => 'Все',
            1 => 'В аренде (частичной аренде)',
            0 => 'Не охвачены орендой',
        ]
    ); ?>

    <h4>РОЗМІЩЕННЯ:</h4>

    <?php echo $form->dropDownListRow(
        $model,
        'region_id',
        ['' => 'Полтавская область'] + CHtml::listData(Region::model()->findAll(), 'id', 'title')
    ); ?>

    <h4>ТИТ ВОДНОГО ОБЪЕКТА:</h4>

    <?php echo $form->dropDownListRow(
        $model,
        'water_object_id',
        ['' => 'Любой тип'] + CHtml::listData(WaterObject::model()->findAll(), 'id', 'title')
    ); ?>

    <h4>ПЛОЩА:</h4>
    <input class="input-medium span3" placeholder="ОТ (ГА)" name="SearchForm[areaFrom]" id="SearchForm_AreaFrom" type="text" value="<?php echo $model['areaFrom']; ?>"> -
    <input class="input-medium span3" placeholder="ДО (ГА)" name="SearchForm[areaTo]" id="SearchForm_AreaTo" type="text" value="<?php echo $model['areaTo']; ?>">

    <?php
        $this->endWidget();
        unset($form);
    ?>
    <div class="clearfix"></div>
</div>

<?php if (empty($result)) : ?>

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

<?php else : ?>

    <h3>РЕЗУЛЬТАТ ПОШУКУ:</h3>

    <?php $this->widget('zii.widgets.CListView', [
        'dataProvider' => $result->search(),
        'itemView' => '_lake', // представление для одной записи
        'ajaxUpdate' => false, // отключаем ajax поведение
        'emptyText' => 'Нет доступных водных объектов.',
        'summaryText' => "{start}&mdash;{end} из {count}",
        'template' => '{summary} {sorter} {items} <hr> {pager}',
        'sorterHeader' => 'Сортировать по:',
        // ключи, которые были описаны $sort->attributes
        // если не описывать $sort->attributes, можно использовать атрибуты модели
        // настройки CSort перекрывают настройки sortableAttributes
        'sortableAttributes' => [
            'title'
        ],
        'pager' => [
            'class' => 'CLinkPager',
            'header' => false,
//            'cssFile' => '/css/pager.css', // устанавливаем свой .css файл
//            'htmlOptions' => ['class' => 'pager'],
        ],
    ]); ?>

<?php endif; ?>