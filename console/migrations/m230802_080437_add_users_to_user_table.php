<?php

use yii\db\Migration;

/**
 * Class m230802_080437_add_users_to_user_table
 */
class m230802_080437_add_users_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('admin'),
            'email' => 'admin@mail.loc',
            'role' => '100',
            'status' => '10',
            'created_at' => time(),
            'updated_at' => time()
        ]);

        $this->insert('{{%user}}', [
            'username' => 'vasya',
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('vasya'),
            'email' => 'vasya@mail.loc',
            'role' => '10',
            'status' => '10',
            'created_at' => time(),
            'updated_at' => time()
        ]);

        $this->insert('{{%user}}', [
            'username' => 'fedya',
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('fedya'),
            'email' => 'fedya@mail.loc',
            'role' => '10',
            'status' => '10',
            'created_at' => time(),
            'updated_at' => time()
        ]);

        $this->insert('{{%user}}', [
            'username' => 'masha',
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('masha'),
            'email' => 'masha@mail.loc',
            'role' => '10',
            'status' => '10',
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user}}', 'username = "admin"');
        $this->delete('{{%user}}', 'username = "vasya"');
        $this->delete('{{%user}}', 'username = "fedya"');
        $this->delete('{{%user}}', 'username = "masha"');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230802_080437_add_users_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
