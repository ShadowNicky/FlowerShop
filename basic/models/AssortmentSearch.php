<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AssortmentSearch represents the model behind the search form of `\app\models\Assortment`.
 */
class AssortmentSearch extends Assortment
{
    public $tagsselected = [];
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code_product', 'code_type'], 'integer'],
            [['name', 'price', 'quantity', 'tagsselected'], 'safe'],
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
        $query = Assortment::find()->joinWith('tags');

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
            'code_product' => $this->code_product,
            'code_type' => $this->code_type,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'quantity', $this->quantity]);
        // если не  пустой массив  с чекбоксами
        if (is_array($this->tagsselected) && !empty($this->tagsselected))
            foreach ($this->tagsselected as $index => $item) {
                $dataProvider->query->orFilterWhere(['tag.id' => $item]);/*добавляем  в запрос  условие  фильтра  по  bl  тега*/
            }
        return $dataProvider;
    }
}
