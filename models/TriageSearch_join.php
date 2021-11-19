<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Triage;

/**
 * TriageSearch represents the model behind the search form of `app\models\Triage`.
 */
class TriageSearch extends Triage {

    /**
     * {@inheritdoc}
     */
    public $claim_code;
    public $bw;
    public $drug_amount;
    public $tel;

    public function rules() {
        return [
            [['id', 'visit_id', 'patient_id', 'doi'], 'integer'],
            [['hoscode', 'hosname', 'patient_cid', 'patient_fullname', 'patient_age', 'patient_gender', 'triage_date', 'triage_time', 'inscl_code', 'claim_code', 'spo2', 'lab_date', 'lab_kind', 'lab_result', 'risk', 'color', 'refer_to', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
            [['family', 'xray', 'patient_chw', 'patient_amp'], 'safe'],
            [['claim_code', 'bw', 'drug_amount', 'tel'], 'safe']
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
        $query = Triage::find();
        $query->joinWith(['visit', 'drug', 'patient']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['patient_id' => SORT_DESC]],
        ]);

        $dataProvider->sort->attributes['claim_code'] = [
            'asc' => ['visit.claim_code' => SORT_ASC],
            'desc' => ['visit.claim_code' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['bw'] = [
            'asc' => ['visit.bw' => SORT_ASC],
            'desc' => ['visit.bw' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['drug_amount'] = [
            'asc' => ['drug.drug_amount' => SORT_ASC],
            'desc' => ['drug.drug_amount' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['tel'] = [
            'asc' => ['patient.tel' => SORT_ASC],
            'desc' => ['patient.tel' => SORT_DESC],
        ];



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
            'triage_date' => $this->triage_date,
            'triage_time' => $this->triage_time,
            'lab_date' => $this->lab_date,
            'doi' => $this->doi,
            'patient_chw' => $this->patient_chw,
            'patient_amp' => $this->patient_amp,
                //'visit.claim_code'=> $this->claim_code
        ]);

        if ($this->color == 'none') {
            $query->andFilterWhere(['is', 'color', new \yii\db\Expression('null')]);
            //->orFilterWhere(['=', 'color', '']);
        } else {
            $query->andFilterWhere(['color' => $this->color]);
        }

        $query->andFilterWhere(['like', 'hoscode', $this->hoscode])
                ->andFilterWhere(['like', 'hosname', $this->hosname])
                ->andFilterWhere(['like', 'patient_cid', $this->patient_cid])
                ->andFilterWhere(['like', 'patient_fullname', $this->patient_fullname])
                ->andFilterWhere(['like', 'patient_age', $this->patient_age])
                ->andFilterWhere(['like', 'patient_gender', $this->patient_gender])
                ->andFilterWhere(['like', 'inscl_code', $this->inscl_code])
                ->andFilterWhere(['like', 'visit.claim_code', $this->claim_code])
                ->andFilterWhere(['like', 'spo2', $this->spo2])
                ->andFilterWhere(['like', 'lab_kind', $this->lab_kind])
                ->andFilterWhere(['like', 'lab_result', $this->lab_result])
                ->andFilterWhere(['like', 'risk', $this->risk])
                ->andFilterWhere(['like', 'xray', $this->xray])
                //->andFilterWhere(['like', 'color', $this->color])
                ->andFilterWhere(['like', 'family', $this->family])
                ->andFilterWhere(['like', 'refer_to', $this->refer_to])
                ->andFilterWhere(['like', 'visit.bw', $this->bw])
                ->andFilterWhere(['like', 'patient.tel', $this->tel])
                ->andFilterWhere(['like', 'drug.drug_amount', $this->drug_amount])
                ->andFilterWhere(['like', 'created_at', $this->created_at])
                ->andFilterWhere(['like', 'created_by', $this->created_by])
                ->andFilterWhere(['like', 'updated_at', $this->updated_at])
                ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }

}
