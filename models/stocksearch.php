<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\stock;

/**
 * stocksearch represents the model behind the search form about `app\models\stock`.
 */
class stocksearch extends stock
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Unit_cost', 'Qty', 'Cost'], 'integer'],
            [['Type', 'Date', 'Item_code', 'PO_ref', 'Brand', 'Descr', 'Supplier', 'C_by', 'C_date', 'M_by', 'M_date', 'status', 'remark'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = stock::find();

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
            'Date' => $this->Date,
            'Unit_cost' => $this->Unit_cost,
            'Qty' => $this->Qty,
            'Cost' => $this->Cost,
            'C_date' => $this->C_date,
            'M_date' => $this->M_date,
        ]);

        $query->andFilterWhere(['like', 'Type', $this->Type])
            ->andFilterWhere(['like', 'Item_code', $this->Item_code])
            ->andFilterWhere(['like', 'PO_ref', $this->PO_ref])
            ->andFilterWhere(['like', 'Brand', $this->Brand])
            ->andFilterWhere(['like', 'Descr', $this->Descr])
            ->andFilterWhere(['like', 'Supplier', $this->Supplier])
            ->andFilterWhere(['like', 'C_by', $this->C_by])
            ->andFilterWhere(['like', 'M_by', $this->M_by])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
