<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "userprofile".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $fname
 * @property string $name
 * @property string|null $sname
 * @property int|null $age
 * @property string|null $dateOfBirth
 * @property string $phone
 * @property string $address
 * @property string $linkGithub
 * @property string $linkVk
 * @property string $linkInstagram
 * @property string|null $proffession
 * @property string $image
 *
 * @property User $user
 */
class Userprofile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userprofile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'age'], 'integer'],
            [['fname', 'name', 'phone', 'address', 'linkGithub', 'linkVk', 'linkInstagram', 'image'], 'required'],
            [['dateOfBirth'], 'safe'],
            [['linkGithub', 'linkVk', 'linkInstagram', 'image'], 'string'],
            [['fname', 'name', 'sname', 'address', 'proffession'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 50],
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
            'fname' => 'Фамилия',
            'name' => 'Имя',
            'sname' => 'Отчество',
            'age' => 'Возраст',
            'dateOfBirth' => 'Дата рождения',
            'phone' => 'Телефонный номер',
            'address' => 'Адрес',
            'linkGithub' => 'GitHub',
            'linkVk' => 'VK',
            'linkInstagram' => 'Instagram',
            'proffession' => 'Профессия',
            'image' => 'Фото',
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
}
