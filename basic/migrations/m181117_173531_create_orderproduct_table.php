<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orderproduct`.
 */
class m181117_173531_create_orderproduct_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{orderproduct}}', [
            'id' => $this->primaryKey(),
            'idorder' => $this->integer()->notNull(),
            'idproduct' => $this->integer()->notNull(),
           
        ], $tableOptions);
    }
    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{orderproduct}}');
    }
}
