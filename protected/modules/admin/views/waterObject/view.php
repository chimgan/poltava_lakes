<?php
$this->breadcrumbs = [
    'Типы водных объектов' => ['admin'],
	$model->title,
];
?>

<h1>Просмотр типа водного объекта: "<?php echo $model->title; ?>"</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data' => $model,
    'attributes' => [
        'id',
        'title',
        'create_date',
    ],
]); ?>