<?php
/**
 * Created by PhpStorm.
 * User: georgy
 * Date: 18.10.14
 * Time: 2:14
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var common\models\Category $category */
/** @var yii\data\ActiveDataProvider $categories */
/** @var yii\data\ActiveDataProvider $posts */

$this->title = 'Category: ' . $category->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="col-sm-9 post-index">

    <h1><?= Html::encode($this->title) ?></h1>

<?php
foreach ($posts->models as $post) {
    echo $this->render('//post/shortView', [
        'model' => $post
    ]);
}
?>
    <div>
        <?= LinkPager::widget([
            'pagination' => $posts->getPagination()
        ]) ?>
    </div>

</div>

<div class="col-sm-3 blog-sidebar">
    <h1><?= 'Categories' ?></h1>
    <ul>
    <?php
    foreach ($categories->models as $category) {
        echo $this->render('shortViewCategory', [
            'model' => $category
        ]);
    }
    ?>
    </ul>
</div>
<div>