<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Visit;

/**
 * VisitSearch represents the model behind the search form of `app\models\Visit`.
 */
class VisitSearch extends Visit {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'patient_id', 'bw', 'bh', 'spo2', 'bps', 'bpd', 'pulse', 'age_y', 'age_m'], 'integer'],
            [['hoscode', 'hosname', 'patient_cid', 'patient_fullname', 'visit_date', 'visit_time', 'cc', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
            [['bmi', 'temperature'], 'number'],
            [['family'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Visit::find();

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
            'patient_id' => $this->patient_id,
            'visit_date' => $this->visit_date,
            'visit_time' => $this->visit_time,
            'bw' => $this->bw,
            'bh' => $this->bh,
            'bmi' => $this->bmi,
            'temperature' => $this->temperature,
            'spo2' => $this->spo2,
            'bps' => $this->bps,
            'bpd' => $this->bpd,
            'pulse' => $this->pulse,
            'age_y' => $this->age_y,
            'age_m' => $this->age_m
        ]);

        $query->andFilterWhere(['like', 'hoscode', $this->hoscode])
                ->andFilterWhere(['like', 'hosname', $this->hosname])
                ->andFilterWhere(['like', 'patient_cid', $this->patient_cid])
                ->andFilterWhere(['like', 'patient_fullname', $this->patient_fullname])
                ->andFilterWhere(['like', 'cc', $this->cc])
                ->andFilterWhere(['like', 'family', $this->family])
                ->andFilterWhere(['like', 'created_at', $this->created_at])
                ->andFilterWhere(['like', 'created_by', $this->created_by])
                ->andFilterWhere(['like', 'updated_at', $this->updated_at])
                ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }

}
