<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $posts */
/** @var yii\data\ActiveDataProvider $categories */
/** @var common\models\Post $post */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-sm-9 post-index">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php
        foreach ($posts->models as $post) {
            echo $this->render('shortView', [
                'model' => $post
            ]);
        }
        ?>
    </div>

    <div class="col-sm-3 blog-sidebar">
        <h1><?= 'Categories' ?></h1>
        <ul>
            <?php
            foreach ($categories->models as $category) {
                echo $this->render('//category/shortViewCategory', [
                    'model' => $category
                ]);
            }
            ?>
        </ul>
    </div>
</div>

<div>
    <?= LinkPager::widget([
        'pagination' => $posts->getPagination()
    ]) ?>
</div>
