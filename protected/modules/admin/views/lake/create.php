<?php
$this->breadcrumbs = [
    'Водные ресурсы' => ['admin'],
    'Создать',
];
?>

<h1>Создать водный ресурс</h1>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>