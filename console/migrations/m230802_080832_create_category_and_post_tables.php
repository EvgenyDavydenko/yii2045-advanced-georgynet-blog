<?php

use yii\db\Migration;

/**
 * Class m230802_080832_create_category_and_post_tables
 */
class m230802_080832_create_category_and_post_tables extends Migration
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

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'anons' => $this->text()->notNull(),
            'content' => $this->text()->notNull(),
            'category_id' => $this->integer(),
            'author_id' => $this->integer(),
            'publish_status' => "enum('publish','draft') NOT NULL DEFAULT 'draft'",
            'publish_date' => $this->timestamp()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-post-author', '{{%post}}', 'author_id');
        $this->addForeignKey('fk-post-author', '{{%post}}', 'author_id', '{{%user}}', 'id', 'SET NULL', 'CASCADE');

        $this->createIndex('idx-post-category', '{{%post}}', 'category_id');
        $this->addForeignKey('fk-post-category', '{{%post}}', 'category_id', '{{%category}}', 'id', 'SET NULL', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
        $this->dropTable('{{%category}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230802_080832_create_category_and_post_tables cannot be reverted.\n";

        return false;
    }
    */
}
