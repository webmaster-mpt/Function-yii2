<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ocenka".
 *
 * @property int $id
 * @property int|null $student_id
 * @property int|null $group_id
 * @property int|null $grade
 */
class Ocenka extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ocenka';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'group_id', 'grade'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'group_id' => 'Group ID',
            'grade' => 'Grade',
        ];
    }

    public static function getStudentGroupList($student_id) {
        $data = Group::find()->select(['id','label as name'])->where(['id'=>$student_id])->asArray()->all();
        return $data;
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent() {
        return $this->hasOne(Student::className(),['id' => 'student_id']);
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup() {
        return $this->hasOne(Group::className(),['id' => 'group_id']);
    }
}
