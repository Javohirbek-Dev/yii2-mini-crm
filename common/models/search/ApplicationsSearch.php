<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Applications;

/**
 * ApplicationsSearch represents the model behind the search form of `common\models\Applications`.
 */
class ApplicationsSearch extends Applications
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tell_number', 'product_status', 'applications_status', 'price'], 'integer'],
            [['user_name', 'applications_name', 'product_name', 'comment', 'created_at', 'updated_at'], 'safe'],
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
        $query = Applications::find();

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
            'tell_number' => $this->tell_number,
            'product_status' => $this->product_status,
            'applications_status' => $this->applications_status,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'applications_name', $this->applications_name])
            ->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
