<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Refer;

/**
 * ReferSearch represents the model behind the search form of `app\models\Refer`.
 */
class ReferSearch extends Refer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'visit_id', 'patient_id'], 'integer'],
            [['hoscode', 'hosname', 'patient_cid', 'patient_fullname', 'refer_date', 'refer_time', 'refer_to', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
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
        $query = Refer::find();

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
            'refer_date' => $this->refer_date,
            'refer_time' => $this->refer_time,
        ]);

        $query->andFilterWhere(['like', 'hoscode', $this->hoscode])
            ->andFilterWhere(['like', 'hosname', $this->hosname])
            ->andFilterWhere(['like', 'patient_cid', $this->patient_cid])
            ->andFilterWhere(['like', 'patient_fullname', $this->patient_fullname])
            ->andFilterWhere(['like', 'refer_to', $this->refer_to])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
