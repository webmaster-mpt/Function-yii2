<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "helper".
 *
 * @property int $id
 * @property string|null $question_text
 * @property string|null $uniq_code
 * @property int|null $admin_id
 * @property int|null $user_id
 * @property int|null $date
 *
 * @property User $user
 */
class Helper extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'helper';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['question_text','uniq_code'], 'string'],
            [['user_id','admin_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uniq_code' => 'Уникальный код',
            'admin_id' => 'Администратор',
            'user_id' => 'Пользователь',
            'question_text' => 'Текст',
            'date' => 'Дата',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getMsg($uniq_code){
        $query = Helper::find()
            ->where(['uniq_code' => $uniq_code])
//            ->andWhere(['user_id' => Yii::$app->user->id])
//            ->orWhere(['admin_id' => Yii::$app->user->id])
            ->all();
//        var_dump($query);die();
        return $query;
    }

    public function getChat($user_id){
        $query = Helper::find()->where(['user_id' => $user_id])->all();
        return $query;
    }

    public function getMsgLists($user_id){
        $query = Helper::find()->select(['admin_id','user_id','uniq_code'])->where(['admin_id' => $user_id])->groupBy(['user_id','uniq_code'])->all();
        return $query;
    }

    public function getUniqCode(){
        $query = Helper::find()->select('uniq_code')->all();
        return $query;
    }
}
