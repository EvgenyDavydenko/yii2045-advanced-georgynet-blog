<?php

namespace frontend\controllers;

use common\models\Post;
use common\models\Category;
use yii\web\Controller;

class PostController extends Controller
{

    public function actionIndex(): string
    {
        $posts = Post::findPublished();
        $posts->setPagination([
            'pageSize' => 4
        ]);

        return $this->render('index', [
            'posts' => $posts,
            'categories' => Category::findCategories()
        ]);
    }

    public function actionView(int $id): string
    {
        return $this->render('view', [
            'model' => Post::findById($id),
        ]);
    }
}