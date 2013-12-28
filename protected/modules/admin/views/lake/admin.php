<?php
$this->breadcrumbs = [
	'Водные ресурсы' => ['admin'],
	'Управление',
];
?>

<h1>Управление водными ресурсами</h1>

<?php echo CHtml::link('Добавить водный ресурс', '/admin/lake/create', ['class' => 'search-button btn']); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', [
    'id' => 'lake-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => [
//        'id',
        [
            'name' => 'water_object_id',
            'value' => '$data->waterObject->title',
            'filter' => CHtml::listData(WaterObject::model()->findAll(), 'id', 'title'),
        ],
        [
            'name' => 'region_id',
            'value' => '$data->region->title',
            'filter' => CHtml::listData(Region::model()->findAll(), 'id', 'title'),
        ],
        'title',
        'description',
//        'lat',
//        'long',
        [
            'name' => 'area',
            'value' => '$data->area . " ГА"',
        ],
        [
            'name' => 'rent',
            'value' => '(!empty($data->rent)) ? "В аренде" : "Свободен"',
            'filter' => [0 => 'Свободен', 1 => 'В аренде'],
        ],
//        'create_date',
        [
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ],
    ],
]); ?>
