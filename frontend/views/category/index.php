<?php

use yii\helpers\Html;
use yii\bootstrap4\LinkPager;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $posts */
/** @var yii\data\ActiveDataProvider $categories */
/** @var common\models\Category $category */

$this->title = 'Статьи категории: ' . $category->title;
?>

<div class="row">
    <div class="col-sm-8 post-index">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php
        foreach ($posts->models as $post):
            echo $this->render('//post/shortView', [
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
                echo $this->render('shortView', [
                    'model' => $category
                ]);
            endforeach
            ?>
        </ul>
    </div>
<div>