<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Items;

/**
 * ItemsSearch represents the model behind the search form of `app\modules\admin\models\Items`.
 */
class ItemsSearch extends Items
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'top_product','remains'], 'integer'],
            [['vendor', 'maingroup_id', 'subgroup_id', 'item', 'description'], 'safe'],
            [['price', 'pur_price', 'old_price'], 'number'],
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
        $query = Items::find();

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
            'price' => $this->price,
            'pur_price' => $this->pur_price,
            'old_price' => $this->old_price,
            'top_product' => $this->top_product,
        ]);

        $query->andFilterWhere(['like', 'vendor', $this->vendor])
            ->andFilterWhere(['like', 'maingroup_id', $this->maingroup_id])
            ->andFilterWhere(['like', 'subgroup_id', $this->subgroup_id])
            ->andFilterWhere(['like', 'item', $this->item])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
