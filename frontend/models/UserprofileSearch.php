<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserProfile;

/**
 * UserProfileSearch represents the model behind the search form of `app\models\UserProfile`.
 */
class UserProfileSearch extends UserProfile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'age'], 'integer'],
            [['fname', 'name', 'sname', 'dateOfBirth', 'address', 'linkGithub', 'linkVk', 'linkInstagram', 'proffession', 'Image','phone'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserProfile::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'age' => $this->age,
            'dateOfBirth' => $this->dateOfBirth,
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'sname', $this->sname])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'linkGithub', $this->linkGithub])
            ->andFilterWhere(['like', 'linkVk', $this->linkVk])
            ->andFilterWhere(['like', 'linkInstagram', $this->linkInstagram])
            ->andFilterWhere(['like', 'proffession', $this->proffession])
            ->andFilterWhere(['like', 'Image', $this->Image]);

        return $dataProvider;
    }
}
