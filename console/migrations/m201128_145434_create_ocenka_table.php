<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ocenka}}`.
 */
class m201128_145434_create_ocenka_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ocenka}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'student_id' => $this->integer()->notNull(),
            'grade' =>  $this->integer()->notNull(),
        ]);
        
        $this->createIndex(
            'idx-ocenka-group_id',
            'ocenka',
            'group_id'
        );

        $this->addForeignKey(
            'fk-ocenka-group_id',
            'ocenka',
            'group_id',
            'student',
            'id',
            'CASCADE'
        );
        
        //student
        $this->createIndex(
            'idx-ocenka-student_id',
            'ocenka',
            'student_id'
        );

        $this->addForeignKey(
            'fk-ocenka-student_id',
            'ocenka',
            'student_id',
            'student',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-ocenka-predmet_id','ocenka');
        $this->dropForeignKey('fk-ocenka-prepod_id','ocenka');
        $this->dropForeignKey('fk-ocenka-student_id','ocenka');
        $this->dropForeignKey('fk-ocenka-group_id','ocenka');
        $this->dropTable('{{%ocenka}}');
    }
}
