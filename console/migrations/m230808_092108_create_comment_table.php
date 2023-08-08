<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m230808_092108_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'pid' => $this->integer(),
            'title' => $this->string()->notNull(),
            'content' => $this->string()->notNull(),
            'publish_status' => "enum('moderate','publish') NOT NULL DEFAULT 'moderate'",
            'post_id' => $this->integer(),
            'author_id' => $this->integer()
        ], $tableOptions);

        $this->createIndex('idx_comment_author', '{{%comment}}', 'author_id');
        $this->addForeignKey('fk_comment_author', '{{%comment}}', 'author_id', '{{%user}}', 'id', 'SET NULL', 'CASCADE');

        $this->createIndex('idx_comment_post', '{{%comment}}', 'post_id');
        $this->addForeignKey('fk_comment_post', '{{%comment}}', 'post_id', '{{%post}}', 'id', 'SET NULL', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
