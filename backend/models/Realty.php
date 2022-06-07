<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%realty}}".
 *
 * @property int $id
 * @property string $name
 *
 * @property Aboba[] $abobas
 */
class Realty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%realty}}';
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
        return $this->hasMany(Aboba::className(), ['realty_id' => 'id']);
    }
}
