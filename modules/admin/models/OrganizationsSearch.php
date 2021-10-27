<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Organizations;

/**
 * OrganizationsSearch represents the model behind the search form of `app\modules\admin\models\Organizations`.
 */
class OrganizationsSearch extends Organizations
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'discount'], 'integer'],
            [['name', 'inn', 'ogrn', 'kpp', 'adres_registr', 'adres_fact', 'pay_account', 'kor_account', 'bik_bank', 'bank_name'], 'safe'],
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
        $query = Organizations::find();

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
            'user_id' => $this->user_id,
            'discount' => $this->discount,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'ogrn', $this->ogrn])
            ->andFilterWhere(['like', 'kpp', $this->kpp])
            ->andFilterWhere(['like', 'adres_registr', $this->adres_registr])
            ->andFilterWhere(['like', 'adres_fact', $this->adres_fact])
            ->andFilterWhere(['like', 'pay_account', $this->pay_account])
            ->andFilterWhere(['like', 'kor_account', $this->kor_account])
            ->andFilterWhere(['like', 'bik_bank', $this->bik_bank])
            ->andFilterWhere(['like', 'bank_name', $this->bank_name]);

        return $dataProvider;
    }
}
