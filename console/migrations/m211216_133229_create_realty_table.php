<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%realty}}`.
 */
class m211216_133229_create_realty_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%realty}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%realty}}');
    }
}
