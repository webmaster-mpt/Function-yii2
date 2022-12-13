<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dictionary".
 *
 * @property int $id
 * @property string|null $deutch
 * @property string|null $russian
 * @property string|null $transcription
 */
class Dictionary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dictionary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deutch', 'russian','transcription'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'deutch' => 'Немецкий',
            'russian' => 'Русский',
            'transcription' => 'Транскрипция',
        ];
    }
}
