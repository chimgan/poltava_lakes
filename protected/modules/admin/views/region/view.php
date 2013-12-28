<?php
$this->breadcrumbs = [
    'Населенные пункты' => ['admin'],
	$model->title,
];
?>

<h1>Просмотр населенного пунтка: "<?php echo $model->title; ?>"</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data' => $model,
    'attributes' => [
        'id',
        [
            'name' => 'root_id',
            'value' => (!empty($model->root_id)) ? $model->center->title : "Не определен",
        ],
        'title',
        'create_date',
    ],
]); ?>
