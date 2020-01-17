<?php

use yii\db\Migration;

/**
 * Class m200117_105117_user
 */
class m200117_105117_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(), //id
            'username' => $this->string(),
            'password' => $this->string(),
            'auth_key' => $this->string(),
            'role' => $this->string(),

        ]);

        $this->insert('user', [
            'username' => 'admin',
            'password' => 'admin',
            'role'=>'admin'
        ]);

        $this->insert('user', [
            'username' => 'user',
            'password' => 'user',
            'role'=>'user'
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }

}
