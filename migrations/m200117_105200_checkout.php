<?php

use yii\db\Migration;

/**
 * Class m200117_105200_checkout
 */
class m200117_105200_checkout extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%checkout}}', [
            'id' => $this->primaryKey(), //id покупки
            'user_id' => $this->integer()->notNull(), //покупатель
            'item_id' => $this->integer()->notNull(), //что купил
            'total_price' => $this->string(), //сумарная цена
            'description' => $this->string(), //описание к заказу
            'status' => $this->boolean(), //статус заказа (true - успешно)
        ]);

        //Подключить таблицу со внешним ключом
        $this->createIndex(
            '{{%checkout-user_id}}',
            '{{%checkout}}', //текущая таблица
            'user_id' //строка со внешним ключом
        );

        // Добавить вторичный ключ
        $this->addForeignKey(
            '{{%fk-checkout-user_id}}', //название связи (любое)
            '{{%checkout}}', //главная таблица
            'user_id', //строка в текущей таблице со внешним ключом
            '{{%user}}', //таблица со внешним ключом
            'id', //колонка во второй таблице
            'CASCADE' //метод при удалении
        );

        $this->createIndex(
            '{{%checkout-item_id}}',
            '{{%checkout}}', //текущая таблица
            'item_id' //строка со внешним ключом
        );


        $this->addForeignKey(
            '{{%fk-checkout-item_id}}', //название связи (любое)
            '{{%checkout}}', //главная таблица
            'item_id', //строка в текущей таблице со внешним ключом
            '{{%item}}', //таблица со внешним ключом
            'id', //колонка во второй таблице
            'CASCADE' //метод при удалении
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            '{{%fk-checkout-item_id}}',
            '{{%checkout}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%checkout-item_id}}',
            '{{%checkout}}'
        );

        $this->dropForeignKey(
            '{{%fk-checkout-user_id}}',
            '{{%checkout}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%checkout-user_id}}',
            '{{%checkout}}'
        );

        $this->dropTable('{{%checkout}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200117_105200_checkout cannot be reverted.\n";

        return false;
    }
    */
}
