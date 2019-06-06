<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%points}}`.
 */
class m190606_084726_create_points_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%points}}', [
            'id' => $this->primaryKey(),
            'val' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%points}}');
    }
}
