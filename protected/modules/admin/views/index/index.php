<?php
/* @var $this DefaultController */

$this->breadcrumbs = [
	$this->module->id,
];
?>
<h1>Here can be place manual for using this module</h1>

<p>
This is the view content for action "<?php echo $this->action->id; ?>".
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>

<?php
//echo CHtml::image("/images/thumb.jpg", "thumbs");
?>