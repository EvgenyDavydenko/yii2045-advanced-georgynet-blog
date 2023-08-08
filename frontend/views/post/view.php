<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Post $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <div class="meta">
        <p><?= 'Author'?>: <?= $model->author->username ?>
        <?= '| Publish date'?>: <?= $model->publish_date ?>
        <?= '| Category' ?>: <?= Html::a($model->category->title, ['category/index', 'id' => $model->category->id]) ?></p>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'content:ntext',
            // 'category_id',
            // 'author_id',
            'publish_date:datetime',
        ],
    ]) ?>

    <div class="tags">
        <?php
        $tags = [];
        foreach($model->getTagPost()->all() as $postTag) {
            $tag = $postTag->getTag()->one();
            $tags[] = Html::a($tag->title, ['tag/view', 'id' => $tag->id]);
        } ?>

        <?= 'Tags: ' . implode(', ', $tags) ?>
    </div>

</div>