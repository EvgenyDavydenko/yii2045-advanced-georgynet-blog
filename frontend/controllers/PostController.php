<?php

namespace frontend\controllers;

use common\models\Post;
use common\models\Category;
use yii\web\Controller;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * Lists all Post models.
     * @return string
     */
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

    /**
     * Displays a single Post model.
     * @param int $id ID
     * @return string
     */
    public function actionView(int $id): string
    {
        return $this->render('view', [
            'model' => Post::findById($id),
        ]);
    }
}
