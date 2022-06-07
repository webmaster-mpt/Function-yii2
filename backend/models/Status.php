<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%status}}".
 *
 * @property int $id
 * @property string $name
 *
 * @property Aboba[] $abobas
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%status}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Abobas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAbobas()
    {
        return $this->hasMany(Aboba::className(), ['status_id' => 'id']);
    }
}
