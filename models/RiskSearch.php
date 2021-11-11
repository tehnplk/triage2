<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Risk;

/**
 * RiskSearch represents the model behind the search form of `app\models\Risk`.
 */
class RiskSearch extends Risk
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'visit_id', 'patient_id'], 'integer'],
            [['hoscode', 'hosname', 'patient_cid', 'patient_fullname', 'risk_date', 'risk_time', 'aging', 'bmi', 'dm', 'copd', 'cirrhosis', 'stroke', 'ihd', 'hiv', 'cancer', 'suppress', 'preg', 'non_risk', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
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
        $query = Risk::find();

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
            'risk_date' => $this->risk_date,
            'risk_time' => $this->risk_time,
        ]);

        $query->andFilterWhere(['like', 'hoscode', $this->hoscode])
            ->andFilterWhere(['like', 'hosname', $this->hosname])
            ->andFilterWhere(['like', 'patient_cid', $this->patient_cid])
            ->andFilterWhere(['like', 'patient_fullname', $this->patient_fullname])
            ->andFilterWhere(['like', 'aging', $this->aging])
            ->andFilterWhere(['like', 'bmi', $this->bmi])
            ->andFilterWhere(['like', 'dm', $this->dm])
            ->andFilterWhere(['like', 'copd', $this->copd])
            ->andFilterWhere(['like', 'cirrhosis', $this->cirrhosis])
            ->andFilterWhere(['like', 'stroke', $this->stroke])
            ->andFilterWhere(['like', 'ihd', $this->ihd])
            ->andFilterWhere(['like', 'hiv', $this->hiv])
            ->andFilterWhere(['like', 'cancer', $this->cancer])
            ->andFilterWhere(['like', 'suppress', $this->suppress])
            ->andFilterWhere(['like', 'preg', $this->preg])
            ->andFilterWhere(['like', 'non_risk', $this->non_risk])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
