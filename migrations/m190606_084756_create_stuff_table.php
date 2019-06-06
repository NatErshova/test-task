<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stuff}}`.
 */
class m190606_084756_create_stuff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stuff}}', [
            'id' => $this->primaryKey(),
            'val' => $this->text(),
            'amt' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%stuff}}');
    }
}
