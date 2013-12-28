<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', [
	'id' => 'lake-form',
	'enableAjaxValidation' => false,
]); ?>

    <p class="help-block">Поля помеченные <span class="required">*</span> обязательны к заполению.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListRow(
        $model,
        'water_object_id',
        CHtml::listData(WaterObject::model()->findAll(), 'id', 'title')
    ); ?>

    <?php echo $form->dropDownListRow(
        $model,
        'region_id',
        CHtml::listData(Region::model()->findAll(), 'id', 'title')
    ); ?>

    <?php echo $form->textFieldRow($model, 'title', ['class' => 'span5', 'maxlength' => 255]); ?>

    <?php echo $form->textAreaRow($model, 'description', ['rows' => 6, 'cols' => 50, 'class' => 'span8']); ?>
<!--    --><?php //echo $form->redactorRow(
//        $model,
//        'description',
//        ['class' => 'span4', 'rows' => 5, 'options' => ['plugins' => ['clips', 'fontfamily'], 'lang' => 'ru']]
//    ); ?>

    <?php echo $form->textFieldRow($model, 'lat', ['class' => 'span3', 'maxlength' => 100]); ?>
    <?php echo $form->textFieldRow($model, 'long', ['class' => 'span3', 'maxlength' => 100]); ?>
    <?php $this->widget('ext.coordinatepicker.CoordinatePicker', [
            'model' => $model,
            'latitudeAttribute' => 'lat',
            'longitudeAttribute' => 'long',

            //optional settings
            'editZoom' => Yii::app()->params['editZoom'],
            'pickZoom' => Yii::app()->params['pickZoom'],
            'defaultLatitude' => Yii::app()->params['defaultLatitude'],
            'defaultLongitude' => Yii::app()->params['defaultLongitude'],
        ]); ?>

    <?php echo $form->textFieldRow($model, 'area', ['class' => 'span2', 'maxlength' => 10, 'append' => 'ГА']); ?>

    <?php echo $form->toggleButtonRow($model, 'rent', ['enabledLabel' => 'В аренде', 'disabledLabel' => 'Свободно', 'width' => 200]); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? 'Создать' : 'Обновить',
        ]); ?>
    </div>

<?php $this->endWidget(); ?>
