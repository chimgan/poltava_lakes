<?php
$this->breadcrumbs = [
    'Населенные пункты' => ['admin'],
	$model->title => ['view', 'id' => $model->id],
	'Редактирование',
];
?>

<h1>Редактирование населенного пунтка: "<?php echo $model->title; ?>"</h1>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>