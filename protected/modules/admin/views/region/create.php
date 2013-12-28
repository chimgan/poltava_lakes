<?php
$this->breadcrumbs = [
    'Населенные пункты' => ['admin'],
	'Создать',
];
?>

<h1>Создать населенный пункт</h1>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>