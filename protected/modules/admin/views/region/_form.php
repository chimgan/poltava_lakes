<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',[
	'id' => 'region-form',
	'enableAjaxValidation' => false,
]); ?>

    <p class="help-block">Поля помеченные <span class="required">*</span> обязательны к заполению.</p>

    <?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow(
        $model,
        'root_id',
        ['' => 'Не определен'] + CHtml::listData(Region::model()->findAllByAttributes(['root_id' => null]), 'id', 'title')
    ); ?>

	<?php echo $form->textFieldRow($model,'title', ['class' => 'span5', 'maxlength' => 100]); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? 'Создать' : 'Обновить',
        ]); ?>
    </div>

<?php $this->endWidget(); ?>
