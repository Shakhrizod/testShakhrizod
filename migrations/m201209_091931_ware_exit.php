<?php

use yii\db\Migration;

/**
 * Class m201209_091931_ware_exit
 */
class m201209_091931_ware_exit extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201209_091931_ware_exit cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('ware_exit', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'sell_price' => $this->integer()->notNull(),
            'amount' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'number' => $this->string()->null(),
            'ware_enter_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('ware_exit');
    }
}
