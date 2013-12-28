<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs = [
	'$label' => ['admin'],
	\$model->{$nameColumn},
];\n";
?>
?>

<h1>View <?php echo $this->modelClass . " #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView', [
    'data' => $model,
    'attributes' => [
        <?php
        foreach ($this->tableSchema->columns as $column) {
            echo "\t\t'" . $column->name . "',\n";
        }
        ?>
    ],
]); ?>
