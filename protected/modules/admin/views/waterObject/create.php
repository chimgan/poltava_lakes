<?php
$this->breadcrumbs=array(
    'Типы водных объектов' => ['admin'],
	'Создать',
);
?>

<h1>Создать новый тип водного объекта</h1>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>