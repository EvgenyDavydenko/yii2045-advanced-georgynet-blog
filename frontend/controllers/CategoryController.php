<?php

namespace frontend\controllers;

use common\models\Category;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex(int $id): string
    {
        $category = Category::findById($id);

        $posts = $category->getPosts();
        $posts->setPagination([
            'pageSize' => 4
        ]);

        return $this->render('index', [
            'category' => $category,
            'posts' => $posts,
            'categories' => Category::findCategories()
        ]);
    }

}