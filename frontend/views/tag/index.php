<?php

use yii\helpers\Html;
use yii\bootstrap4\LinkPager;

/** @var  common\models\Tag $tag */
/** @var  common\models\TagPost $postTag */
/** @var  yii\data\ActiveDataProvider $posts */
/** @var  yii\data\ActiveDataProvider $categories */


$this->title = 'Статьи с тегом: ' . $tag->title;
?>

<div class="row">
    <div class="col-sm-8 post-index">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php
        foreach ($posts->models as $postTag):
            echo $this->render('//post/shortView', [
                'model' => $postTag->getPost()->one()
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
            foreach ($categories->models as $tagItem):
                echo $this->render('//category/shortView', [
                    'model' => $tagItem
                ]);
            endforeach
            ?>
        </ul>
    </div>
</div>