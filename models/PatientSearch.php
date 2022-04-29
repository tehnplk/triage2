<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patient;

/**
 * PatientSearch represents the model behind the search form of `app\models\Patient`.
 */
class PatientSearch extends Patient {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'age_y', 'age_m', 'age_d'], 'integer'],
            [['hoscode', 'hosname', 'cid', 'prefix', 'first_name', 'last_name', 'gender', 'bdate', 'bmon', 'byear', 'birth', 'marital', 'nation', 'family', 'personal_disease', 'addr_no', 'addr_road', 'addr_moo', 'addr_tmb', 'addr_amp', 'addr_chw', 'tel', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
            [['addr_tmb_name', 'addr_amp_name', 'addr_chw_name',], 'safe'],
            [['drug_allergy'], 'safe']
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
        $query = Patient::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
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
            'birth' => $this->birth,
            'age_y' => $this->age_y,
            'age_m' => $this->age_m,
            'age_d' => $this->age_d,
        ]);

        $query->andFilterWhere(['like', 'hoscode', $this->hoscode])
                ->andFilterWhere(['like', 'hosname', $this->hosname])
                ->andFilterWhere(['like', 'cid', $this->cid])
                ->andFilterWhere(['like', 'prefix', $this->prefix])
                ->andFilterWhere(['like', 'first_name', $this->first_name])
                ->andFilterWhere(['like', 'last_name', $this->last_name])
                ->andFilterWhere(['like', 'gender', $this->gender])
                ->andFilterWhere(['like', 'bdate', $this->bdate])
                ->andFilterWhere(['like', 'bmon', $this->bmon])
                ->andFilterWhere(['like', 'byear', $this->byear])
                ->andFilterWhere(['like', 'marital', $this->marital])
                ->andFilterWhere(['like', 'nation', $this->nation])
                ->andFilterWhere(['like', 'family', $this->family])
                ->andFilterWhere(['like', 'personal_disease', $this->personal_disease])
                ->andFilterWhere(['like', 'drug_allergy', $this->drug_allergy])
                ->andFilterWhere(['like', 'addr_no', $this->addr_no])
                ->andFilterWhere(['like', 'addr_road', $this->addr_road])
                ->andFilterWhere(['like', 'addr_moo', $this->addr_moo])
                ->andFilterWhere(['like', 'addr_tmb', $this->addr_tmb])
                ->andFilterWhere(['like', 'addr_amp', $this->addr_amp])
                ->andFilterWhere(['like', 'addr_chw', $this->addr_chw])
                ->andFilterWhere(['like', 'addr_tmb_name', $this->addr_tmb_name])
                ->andFilterWhere(['like', 'addr_amp_name', $this->addr_amp_name])
                ->andFilterWhere(['like', 'addr_chw_name', $this->addr_chw_name])
                ->andFilterWhere(['like', 'tel', $this->tel])
                ->andFilterWhere(['like', 'created_at', $this->created_at])
                ->andFilterWhere(['like', 'created_by', $this->created_by])
                ->andFilterWhere(['like', 'updated_at', $this->updated_at])
                ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }

}
