<?php

use yii\db\Migration;

/**
 * Class m230804_195246_add_tag_table
 */
class m230804_195246_add_tag_table extends Migration
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

        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%tag_post}}', [
            'id' => $this->primaryKey(),
            'tag_id' => $this->integer(),
            'post_id' => $this->integer()
        ], $tableOptions);

        $this->createIndex('idx-post-tag', '{{%tag_post}}', 'tag_id');
        $this->addForeignKey('fk-post-tag', '{{%tag_post}}', 'tag_id', '{{%tag}}', 'id', 'SET NULL', 'CASCADE');

        $this->createIndex('idx-tag-post', '{{%tag_post}}', 'post_id');
        $this->addForeignKey('fk-tag-post', '{{%tag_post}}', 'post_id', '{{%post}}', 'id', 'SET NULL', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tag}}');
        $this->dropTable('{{%tag_post}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230804_195246_add_tag_table cannot be reverted.\n";

        return false;
    }
    */
}
