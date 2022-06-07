<?php

use yii\db\Migration;

/**
 * Class m211217_170833_create_aboba_table
 */
class m211217_112146_create_aboba_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%aboba}}', [
            'id' => $this->primaryKey(),
            'fname' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'sname' => $this->string()->Null(),
            'age' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'date_birthday' => $this->date()->notNull(),
            'realty_id' => $this->integer()->notNull(),
        ]);
        // creates index for column `author_id`
        $this->createIndex(
            'idx-aboba-status_id',
            'aboba',
            'status_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-aboba-status_id',
            'aboba',
            'status_id',
            'status',
            'id',
            'CASCADE'
        );
        // creates index for column `author_id`
        $this->createIndex(
            'idx-aboba-realty_id',
            'aboba',
            'realty_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-aboba-realty_id',
            'aboba',
            'realty_id',
            'realty',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-aboba-status_id',
            'aboba'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-aboba-status_id',
            'aboba'
        );

        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-aboba-realty_id',
            'aboba'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-aboba-realty_id',
            'aboba'
        );
        $this->dropTable('{{%user}}');
    }

}
