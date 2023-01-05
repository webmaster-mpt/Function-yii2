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
 * @property string|null type
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
            [['deutch', 'russian','transcription','type'], 'string'],
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
            'type' => 'Тип',
        ];
    }

//    public function upRow($id)
//    {
//        $query = Dictionary::find()
//            ->where(['id' => $id])
//            ->one();
//        $secQuery = Dictionary::find()
//            ->where(['id' => $id-1])
//            ->one();
//        $query->id = 999;
//        $query->save();
//        $secQuery->id = $id;
//        $secQuery->save();
//        $thirdQuery = Dictionary::find()
//            ->where(['id' => 999])
//            ->one();
//        $thirdQuery->id = $id-1;
//        $thirdQuery->save();
//    }
//
//    public function downRow($id)
//    {
//        $query = Dictionary::find()
//            ->where(['id' => $id])
//            ->one();
//        $secQuery = Dictionary::find()
//            ->where(['id' => $id+1])
//            ->one();
//        $newId = $query->id = 999;
//        $query->save();
//        $secondId = $secQuery->id = $id;
//        $secQuery->save();
//        $thirdQuery = Dictionary::find()
//            ->where(['id' => 999])
//            ->one();
//        $thirId = $thirdQuery->id = $id+1;
//        $thirdQuery->save();
//    }

}
