<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m181117_173515_create_order_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{order}}', [
            'id' => $this->primaryKey(),
            'iduser' => $this->integer()->notNull(),
           
        ], $tableOptions);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{order}}');
    }
}
