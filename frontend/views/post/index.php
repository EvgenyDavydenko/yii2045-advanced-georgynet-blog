<?php

use yii\helpers\Html;
use yii\bootstrap4\LinkPager;

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
        <div class="mt-3">
            <?= LinkPager::widget([
                'pagination' => $posts->getPagination()
            ]) ?>
        </div>  
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