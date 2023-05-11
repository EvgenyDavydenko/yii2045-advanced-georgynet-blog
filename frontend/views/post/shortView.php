<?php

use yii\helpers\Html;

/** @var common\models\Post $model */
?>
<div class="card mt-3">
    <div class="card-header">
        <h3><?= $model->title ?></h3>
    </div>

    <div class="card-body">
        <?= $model->anons ?> 
        <?= Html::a('More', ['post/view', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="card-footer">
        <p><?= 'Author' ?>: <?= $model->author->username ?>
        <?= '| Publish date' ?>: <?= $model->publish_date ?>
        <?= '| Category' ?>: <?= Html::a($model->category->title, ['category/index', 'id' => $model->category->id]) ?></p>
    </div>
</div>