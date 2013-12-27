<?php
    $this->breadcrumbs=array(
        'Типы водных объектов' => ['admin'],
        $model->title => ['view', 'id' => $model->id],
        'Обновить',
    );
?>

<h1>Обновление типа водного объекта: "<?php echo $model->title; ?>"</h1>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>