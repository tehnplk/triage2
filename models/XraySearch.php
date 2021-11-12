<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Xray;

/**
 * XraySearch represents the model behind the search form of `app\models\Xray`.
 */
class XraySearch extends Xray
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'visit_id', 'patient_id'], 'integer'],
            [['hoscode', 'hosname', 'patient_cid', 'patient_fullname', 'xray_date', 'xray_time', 'xray_type', 'xray_result', 'xray_cat', 'covid19_pneumonia_cat', 'conclusion', 'comparison', 'finding', 'note', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
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
        $query = Xray::find();

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
            'xray_date' => $this->xray_date,
            'xray_time' => $this->xray_time,
        ]);

        $query->andFilterWhere(['like', 'hoscode', $this->hoscode])
            ->andFilterWhere(['like', 'hosname', $this->hosname])
            ->andFilterWhere(['like', 'patient_cid', $this->patient_cid])
            ->andFilterWhere(['like', 'patient_fullname', $this->patient_fullname])
            ->andFilterWhere(['like', 'xray_type', $this->xray_type])
            ->andFilterWhere(['like', 'xray_result', $this->xray_result])
            ->andFilterWhere(['like', 'xray_cat', $this->xray_cat])
            ->andFilterWhere(['like', 'covid19_pneumonia_cat', $this->covid19_pneumonia_cat])
            ->andFilterWhere(['like', 'conclusion', $this->conclusion])
            ->andFilterWhere(['like', 'comparison', $this->comparison])
            ->andFilterWhere(['like', 'finding', $this->finding])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
