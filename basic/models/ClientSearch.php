<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ClientSearch represents the model behind the search form of `\app\models\Client`.
 */
class ClientSearch extends Client
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code_client', 'number'], 'integer'],
            [['full_name', 'address', 'e_mail'], 'safe'],
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
        $query = Client::find();

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
            'code_client' => $this->code_client,
            'number' => $this->number,
        ]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'e_mail', $this->e_mail]);

        return $dataProvider;
    }
}
