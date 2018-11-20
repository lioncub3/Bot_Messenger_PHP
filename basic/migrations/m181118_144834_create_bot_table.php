<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot`.
 */
class m181118_144834_create_bot_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('bot', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'iduser' => $this->integer(20)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('bot');
    }
}
