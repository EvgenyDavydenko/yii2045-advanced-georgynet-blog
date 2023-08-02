<?php

/** @var  common\models\Category $model */
?>

<li>
    <?= \yii\helpers\Html::a($model->title, ['category/index', 'id' => $model->id])?>
</li>