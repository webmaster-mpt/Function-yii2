<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $userGet_id
 * @property string|null $created_at
 * @property string $text
 *
 * @property User $user
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id','userGet_id'], 'integer'],
            [['created_at'], 'safe'],
            [['text'], 'string','min' => 1],
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
            'user_id' => 'User ID',
            'userGet_id' => 'User Get ID',
            'created_at' => 'Created At',
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

    /**
     * Gets query for [[UserGet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserGet()
    {
        return $this->hasOne(User::className(), ['id' => 'userGet_id']);
    }

    public function getChatMessage($userGet_id){//вывод сообщений
        $query = Chat::find()
            ->andWhere(['userGet_id' => $userGet_id])
            ->orWhere(['user_id' => $userGet_id])
            ->all();
        return $query;
    }

    public function getChatLists($user_id){//существующие чаты
//        select userGet_id from chat where user_id = 4 group by userGet_id;
        $query = Chat::find()
            ->where(['user_id' => $user_id])
            ->orWhere(['userGet_id' => $user_id])
            ->groupBy('id')
            ->all();
        return $query;
    }

    public function getNewChatLists(){//новые чаты с пользователями
        $user = Chat::find()->from('chat c')->where('u.id = c.user_id OR u.id = c.userGet_id');
        $query = User::find()
            ->from('user u')
            ->where(['role' => 10])
            ->andWhere(['not exists', $user])
            ->indexBy('id')
            ->all();
        return $query;
    }
}
