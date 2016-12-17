<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\approve;

/**
 * ApproveSearch represents the model behind the search form about `app\models\approve`.
 */
class ApproveSearch extends approve
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['from', 'subject', 'application', 'approval_date', 'customer_name', 'customer_address', 'co_applicant_name', 'loan_number', 'loan_product', 'cehi_approval_term', 'bid_percent', 'approval_amount', 'required_down_payment', 'approval_expiration_date', 'app_submitted_by', 'promos', 'stipulation1', 'stipulation2', 'stipulation3', 'approval_term_1', 'approval_term_2', 'approval_term_3', 'approval_term_4', 'approval_term_5'], 'safe'],
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
        $query = approve::find();

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
            ->andFilterWhere(['like', 'co_applicant_name', $this->co_applicant_name])
            ->andFilterWhere(['like', 'loan_number', $this->loan_number])
            ->andFilterWhere(['like', 'loan_product', $this->loan_product])
            ->andFilterWhere(['like', 'cehi_approval_term', $this->cehi_approval_term])
            ->andFilterWhere(['like', 'bid_percent', $this->bid_percent])
            ->andFilterWhere(['like', 'approval_amount', $this->approval_amount])
            ->andFilterWhere(['like', 'required_down_payment', $this->required_down_payment])
            ->andFilterWhere(['like', 'approval_expiration_date', $this->approval_expiration_date])
            ->andFilterWhere(['like', 'app_submitted_by', $this->app_submitted_by])
            ->andFilterWhere(['like', 'promos', $this->promos])
            ->andFilterWhere(['like', 'stipulation1', $this->stipulation1])
            ->andFilterWhere(['like', 'stipulation2', $this->stipulation2])
            ->andFilterWhere(['like', 'stipulation3', $this->stipulation3])
            ->andFilterWhere(['like', 'approval_term_1', $this->approval_term_1])
            ->andFilterWhere(['like', 'approval_term_2', $this->approval_term_2])
            ->andFilterWhere(['like', 'approval_term_3', $this->approval_term_3])
            ->andFilterWhere(['like', 'approval_term_4', $this->approval_term_4])
            ->andFilterWhere(['like', 'approval_term_5', $this->approval_term_5]);

        return $dataProvider;
    }
}
