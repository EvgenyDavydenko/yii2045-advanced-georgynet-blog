<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Tag;
use yii\web\Controller;

class TagController extends Controller
{
    public function actionIndex($id)
    {
        $tag = Tag::findById($id);
        
        $posts = $tag->getPublishedPosts();
        $posts->setPagination([
            'pageSize' => 4
        ]);

        return $this->render('index', [
            'tag' => $tag,
            'posts' => $posts,
            'categories' => Category::findCategories()
        ]);
    }
}