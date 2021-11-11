<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Drug;

/**
 * DrugSearch represents the model behind the search form of `app\models\Drug`.
 */
class DrugSearch extends Drug
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'visit_id', 'patient_id', 'drug_amount'], 'integer'],
            [['hoscode', 'hosname', 'patient_cid', 'patient_fullname', 'drug_date', 'drug_time', 'drug_id', 'drug_name', 'drug_unit', 'drug_usage', 'drug_dispenser', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
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
        $query = Drug::find();

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
            'visit_id' => $this->visit_id,
            'patient_id' => $this->patient_id,
            'drug_date' => $this->drug_date,
            'drug_time' => $this->drug_time,
            'drug_amount' => $this->drug_amount,
        ]);

        $query->andFilterWhere(['like', 'hoscode', $this->hoscode])
            ->andFilterWhere(['like', 'hosname', $this->hosname])
            ->andFilterWhere(['like', 'patient_cid', $this->patient_cid])
            ->andFilterWhere(['like', 'patient_fullname', $this->patient_fullname])
            ->andFilterWhere(['like', 'drug_id', $this->drug_id])
            ->andFilterWhere(['like', 'drug_name', $this->drug_name])
            ->andFilterWhere(['like', 'drug_unit', $this->drug_unit])
            ->andFilterWhere(['like', 'drug_usage', $this->drug_usage])
            ->andFilterWhere(['like', 'drug_dispenser', $this->drug_dispenser])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
