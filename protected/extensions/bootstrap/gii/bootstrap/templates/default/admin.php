<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs = [
	'$label' => ['admin'],
	'Manage',
];\n";
?>
?>

<h1>Manage <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>

<?php echo "<?php echo CHtml::link('Advanced Search', '#', ['class' => 'search-button btn']); ?>"; ?>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView', [
    'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => [
        <?php
        $count = 0;
        foreach ($this->tableSchema->columns as $column) {
            if (++$count == 7) {
                echo "\t\t/*\n";
            }
            echo "\t\t'" . $column->name . "',\n";
        }
        if ($count >= 7) {
            echo "\t\t*/\n";
        }
        ?>
        [
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ],
    ],
]); ?>
