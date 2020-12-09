<?php

use yii\db\Migration;

/**
 * Class m201209_091923_ware_enter
 */
class m201209_091923_ware_enter extends Migration
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
        echo "m201209_091923_ware_enter cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('ware_enter', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'coming_price' => $this->integer()->notNull(),
            'amount' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'number' => $this->string()->null(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('ware_enter');
    }

}
