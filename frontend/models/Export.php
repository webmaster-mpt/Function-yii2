<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "export".
 *
 * @property int $id
 * @property string|null $fname
 * @property string|null $name
 * @property string|null $sname
 */
class Export extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'export';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fname', 'name', 'sname'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fname' => 'Фамилия',
            'name' => 'Имя',
            'sname' => 'Отчество',
        ];
    }
}
