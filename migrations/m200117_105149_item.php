<?php

use yii\db\Migration;

/**
 * Class m200117_105149_item
 */
class m200117_105149_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item}}', [
            'id' => $this->primaryKey(), //id покупки
            'price' => $this->double(), //цена
            'description' => $this->string(), //описание к заказу
        ]);

        $this->insert('item', [
            'price' => '50.99',
            'description' => 'first item',
        ]);

        $this->insert('item', [
            'price' => '20.50',
            'description' => 'second item',
        ]);

        $this->insert('item', [
            'price' => '30.00',
            'description' => 'third item',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%item}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200117_105149_item cannot be reverted.\n";

        return false;
    }
    */
}
