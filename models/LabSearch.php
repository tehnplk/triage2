<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lab;

/**
 * LabSearch represents the model behind the search form of `app\models\Lab`.
 */
class LabSearch extends Lab {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'visit_id', 'patient_id', 'doi'], 'integer'],
            [['hoscode', 'hosname', 'patient_cid', 'patient_fullname', 'lab_date', 'lab_time', 'lab_place', 'lab_kind', 'lab_result', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
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
        $query = Lab::find();

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
            'lab_date' => $this->lab_date,
            'lab_time' => $this->lab_time,
            'doi' => $this->doi,
        ]);

        $query->andFilterWhere(['like', 'hoscode', $this->hoscode])
                ->andFilterWhere(['like', 'hosname', $this->hosname])
                ->andFilterWhere(['like', 'patient_cid', $this->patient_cid])
                ->andFilterWhere(['like', 'patient_fullname', $this->patient_fullname])
                ->andFilterWhere(['like', 'lab_place', $this->lab_place])
                ->andFilterWhere(['like', 'lab_kind', $this->lab_kind])
                ->andFilterWhere(['like', 'lab_result', $this->lab_result])
                ->andFilterWhere(['like', 'created_at', $this->created_at])
                ->andFilterWhere(['like', 'created_by', $this->created_by])
                ->andFilterWhere(['like', 'updated_at', $this->updated_at])
                ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }

}
