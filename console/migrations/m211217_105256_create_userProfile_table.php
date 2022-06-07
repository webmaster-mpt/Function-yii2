<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%userProfile}}`.
 */
class m211217_105256_create_userProfile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%userProfile}}', [
            'id' => $this->primaryKey(),
            'user_id'=> $this->integer()->Null(),
            'fname'=> $this->string()->notNull(),
            'name'=> $this->string()->notNull(),
            'sname'=> $this->string()->Null(),
            'age'=> $this->integer()->Null(),
            'dateOfBirth'=> $this->date()->Null(),
            'phone'=> $this->string()->notNull(),
            'address'=> $this->string()->notNull(),
            'linkGithub'=> $this->text()->notNull(),
            'linkVk'=> $this->text()->notNull(),
            'linkInstagram'=> $this->text()->notNull(),
            'proffession'=> $this->string()->Null(),
            'Image'=> $this->text()->notNull(),
        ]);
        // creates index for column `author_id`
        $this->createIndex(
            'idx-userProfile-user_id',
            'userProfile',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-userProfile-user_id',
            'userProfile',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%userProfile}}');
    }
}
