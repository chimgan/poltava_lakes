<?php
$this->breadcrumbs = [
    'Населенные пункты' => ['admin'],
    'Управление',
];
?>

<h1>Управление населенными пунктами</h1>

<?php echo CHtml::link('Добавить населенный пункт', '/admin/region/create', ['class' => 'search-button btn']); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', [
    'id' => 'region-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => [
        'id',
        [
            'name' => 'root_id',
            'value' => '(!empty($data->root_id)) ? $data->center->title : "Не определен"',
        ],
        'title',
        'create_date',
        [
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ],
    ],
]); ?>
