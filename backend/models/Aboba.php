<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%aboba}}".
 *
 * @property int $id
 * @property string $fname
 * @property string $name
 * @property string|null $sname
 * @property int $age
 * @property int $status_id
 * @property string $date_birthday
 * @property int $realty_id
 *
 * @property Realty $realty
 * @property Status $status
 */
class Aboba extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%aboba}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fname', 'name', 'age', 'status_id', 'date_birthday', 'realty_id'], 'required'],
            [['age', 'status_id', 'realty_id'], 'integer'],
            [['date_birthday'], 'safe'],
            [['fname', 'name', 'sname'], 'string', 'max' => 255],
            [['realty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Realty::className(), 'targetAttribute' => ['realty_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fname' => 'Fname',
            'name' => 'Name',
            'sname' => 'Sname',
            'age' => 'Age',
            'status_id' => 'Status ID',
            'date_birthday' => 'Date Birthday',
            'realty_id' => 'Realty ID',
        ];
    }

    /**
     * Gets query for [[Realty]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRealty()
    {
        return $this->hasOne(Realty::className(), ['id' => 'realty_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }
}
