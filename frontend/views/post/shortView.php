<?php

use yii\helpers\Html;
use common\models\TagPost;

/** @var common\models\Post $model */
/** @var TagPost $postTag */
?>
<div class="card mt-3">
    <div class="card-header">
        <?= Html::a('Читать всю статью', ['post/view', 'id' => $model->id], ['class' => 'btn btn-outline-primary float-right']) ?>
        <h3><?= $model->title ?></h3>
    </div>

    <div class="card-body">
        <?= $model->anons ?> 

    </div>
    <div class="card-footer">
        <p>
            <?= 'Author: ' . $model->author->username ?>
            <?= '| Publish date: ' . $model->publish_date ?>
            <?= '| Category: ' . Html::a($model->category->title, ['category/index', 'id' => $model->category->id]) ?>
        </p>
    </div>
    <div class="tags">
        <?php
        $tags = [];
        foreach($model->getTagPost()->all() as $postTag):
            $tag = $postTag->getTag()->one();
            $tags[] = Html::a($tag->title, ['tag/view', 'id' => $tag->id]);
        endforeach
        ?>

        <?= 'Tags: ' . implode(', ', $tags) ?>
    </div>
</div>