<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 *
 * @property Post[] $posts
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Return posts for a category
     *
     * @return ActiveDataProvider
     */
    public function getPosts(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => Post::find()
                ->where([
                    'category_id' => $this->id,
                    'publish_status' => Post::STATUS_PUBLISH
                ])
        ]);
    }

    /**
     * Return category list
     *
     * @return ActiveDataProvider
     */
    public static function findCategories(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => Category::find(),
            'pagination' => false
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public static function findById(int $id): Category
    {
        if (($model = Category::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested post does not exist.');
    }
}
