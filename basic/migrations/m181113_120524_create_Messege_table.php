<?php

use yii\db\Migration;

/**
 * Handles the creation of table `Messege`.
 */
class m181113_120524_create_Messege_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('Messege', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('Messege');
    }
}
