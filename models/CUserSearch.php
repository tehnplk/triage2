<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CUser;

/**
 * CUserSearch represents the model behind the search form of `app\models\CUser`.
 */
class CUserSearch extends CUser {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['id'], 'integer'],
                [['hoscode', 'hosname', 'username', 'password', 'password2', 'auth_key', 'access_token', 'role', 'cid', 'fullname', 'onestop', 'last'], 'safe'],
                [['last_session', 'last_ip'], 'safe']
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
        $query = CUser::find();
        $hoscode = \Yii::$app->user->identity->hoscode;
        $query->where(['hoscode' => $hoscode]);

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
        ]);

        $query->andFilterWhere(['like', 'hoscode', $this->hoscode])
                ->andFilterWhere(['like', 'hosname', $this->hosname])
                ->andFilterWhere(['like', 'username', $this->username])
                ->andFilterWhere(['like', 'password', $this->password])
                ->andFilterWhere(['like', 'password2', $this->password2])
                ->andFilterWhere(['like', 'auth_key', $this->auth_key])
                ->andFilterWhere(['like', 'access_token', $this->access_token])
                ->andFilterWhere(['like', 'role', $this->role])
                ->andFilterWhere(['like', 'cid', $this->cid])
                ->andFilterWhere(['like', 'fullname', $this->fullname])
                ->andFilterWhere(['like', 'onestop', $this->onestop])
                ->andFilterWhere(['like', 'last', $this->last])
                ->andFilterWhere(['like', 'last_session', $this->last_session])
                ->andFilterWhere(['like', 'last_ip', $this->last_ip])
        ;

        return $dataProvider;
    }

}
