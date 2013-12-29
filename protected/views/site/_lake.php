<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 12/29/13
 * Time: 10:26 PM
 */
?>
<div class="lake_item">
    <div class="lake_title"><?php echo $data['title']; ?></div>
    <div class="lake_custom_link">
        <?php echo CHtml::link('Подробнее', Yii::app()->controller->createUrl('/site/lake', ['id' => $data['id']]), ['class' => 'search-button btn']); ?>
    </div>
</div>