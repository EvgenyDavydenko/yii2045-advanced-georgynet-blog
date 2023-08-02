<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $posts */
/** @var yii\data\ActiveDataProvider $categories */
/** @var common\models\Post $post */

$this->title = 'Все статьи';
?>

<div class="row">
    <div class="col-sm-8 post-index">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php
        foreach ($posts->models as $post):
            echo $this->render('shortView', [
                'model' => $post
            ]);
        endforeach
        ?>
    </div>

    <div class="col-sm-3 offset-sm-1 blog-sidebar">
        <h1><?= 'Категории:' ?></h1>
        <ul>
            <?php
            foreach ($categories->models as $category):
                echo $this->render('//category/shortView', [
                    'model' => $category
                ]);
            endforeach
            ?>
        </ul>
    </div>
</div>

<div class="row mt-3">
<div class="col-sm-8">
    <?= LinkPager::widget([
        'pagination' => $posts->getPagination(),
        'maxButtonCount' => 5,
        'activePageCssClass' => 'active',
        'linkContainerOptions' => ['class' => 'page-item'],
        'linkOptions' => ['class' => 'page-link'],
        'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
    ]) ?>
</div>    
</div>