<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "msg".
 *
 * @property int $id
 * @property string|null $uniq_code
 * @property int|null $user_id
 * @property int|null $userGet_id
 * @property string|null $text
 *
 * @property User $user
 */
class Msg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'msg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uniq_code','text'], 'string'],
            [['user_id', 'userGet_id'], 'integer'],
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
            'uniq_code' => 'Uniq Code',
            'user_id' => 'User ID',
            'userGet_id' => 'User Get ID',
            'text' => 'Текст сообщения',
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

    public function getMsg($unique_code){
        $query = Msg::find()->where(['uniq_code' => $unique_code])->all();
        return $query;
    }

    public function getMsgLists($user_id){
        $query = Msg::find()->where(['userGet_id' => $user_id])->all();
        return $query;
    }
}
