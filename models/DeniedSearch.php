<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\denied;

/**
 * DeniedSearch represents the model behind the search form about `app\models\denied`.
 */
class DeniedSearch extends denied
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['from', 'subject', 'application', 'approval_date', 'customer_name', 'customer_address', 'loan_number', 'loan_product', 'bid_percent', 'app_submitted_by', 'promos'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = denied::find();

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
        ]);

        $query->andFilterWhere(['like', 'from', $this->from])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'application', $this->application])
            ->andFilterWhere(['like', 'approval_date', $this->approval_date])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_address', $this->customer_address])
            ->andFilterWhere(['like', 'loan_number', $this->loan_number])
            ->andFilterWhere(['like', 'loan_product', $this->loan_product])
            ->andFilterWhere(['like', 'bid_percent', $this->bid_percent])
            ->andFilterWhere(['like', 'app_submitted_by', $this->app_submitted_by])
            ->andFilterWhere(['like', 'promos', $this->promos]);

        return $dataProvider;
    }
}
