<?php

namespace frontend\models;

use common\models\Comment;
use yii\base\Model;

class CommentForm extends Model
{
    /**
     * @var null|string action формы
     */
    public $action = null;
    /**
     * @var int|null идентификатор родительского комментария
     */
    public $pid = null;
    /**
     * @var string заголовок комментария
     */
    public $title;
    /**
     * @var string контент комментария
     */
    public $content;

    public function __construct($action = null)
    {
        $this->action = $action;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['pid', 'post_id'], 'integer'],
            [['title', 'content'], 'required'],
            [['title', 'content'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'title' => 'Заголовок',
            'content' => 'Комментарий'
        ];
    }

    public function save(Comment $comment, array $data): bool
    {
        $isLoad = $comment->load([
            'pid' => $data['pid'],
            'title' => $data['title'],
            'content' => $data['content']
        ], '');

        return ($isLoad && $comment->save());
    }
}