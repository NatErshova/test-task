<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%money}}`.
 */
class m190606_084546_create_money_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%money}}', [
            'id' => $this->primaryKey(),
            'val' => $this->integer(),
            'amt' => $this->integer(),
            'coef' => $this->float(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%money}}');
    }
}
