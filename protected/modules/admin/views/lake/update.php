<?php
$this->breadcrumbs = [
    'Водные ресурсы' => ['admin'],
	$model->title => ['view', 'id' => $model->id],
	'Редактировать',
];
?>

<h1>Редактировать водный ресурс: "<?php echo $model->title; ?>"</h1>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>