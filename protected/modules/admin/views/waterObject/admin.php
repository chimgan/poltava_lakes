<?php
$this->breadcrumbs = array(
    'Типы водных объектов' => ['admin'],
    'Управление',
);
?>

<h1>Управление типами водных объектов</h1>

<?php echo CHtml::link('Создать новый тип водного объекта', '/admin/waterObject/create', array('class' => 'search-button btn')); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', [
    'id' => 'water-object-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => [
        'id',
        'title',
        [
            'name' => 'create_date',
            'type' => 'raw',
            'value' => '$data->create_date',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', [
                'model' => $model,
                'attribute' => 'create_date',
                'language' => 'ru',
                'options' => [
                    'showAnim' => 'fold',
                    'dateFormat' => 'yy-mm-dd',
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                ],
            ], true),
        ],
        [
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ],
    ],
    'afterAjaxUpdate' => "function() {
        jQuery('#WaterObject_create_date').datepicker(jQuery.extend(jQuery.datepicker.regional['ru'],{
                                            'showAnim':'fold',
                                            'dateFormat':'yy-mm-dd',
                                            'changeMonth':'true',
                                            'changeYear':'true'}));
    }",
]); ?>
