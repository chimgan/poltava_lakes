<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - ' . 'Авторизация';
$this->breadcrumbs = [
    'Авторизация администратора',
];
?>

<h1><?php echo 'Форма авторизации'; ?></h1>

<p><?php echo 'Условия'; ?>:</p>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', [
    'id' => 'verticalForm',
    'htmlOptions' => ['class' => 'well'],
]); ?>

<?php echo $form->textFieldRow($model, 'username', ['class' => 'span3']); ?>
<?php echo $form->passwordFieldRow($model, 'password', ['class' => 'span3']); ?>
<?php echo $form->checkboxRow($model, 'rememberMe'); ?>
<?php $this->widget('bootstrap.widgets.TbButton', ['buttonType' => 'submit', 'label' => 'Авторизация']); ?>

<?php $this->endWidget(); ?>