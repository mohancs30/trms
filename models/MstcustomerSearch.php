<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mstcustomer;

/**
 * MstcustomerSearch represents the model behind the search form about `app\models\Mstcustomer`.
 */
class MstcustomerSearch extends Mstcustomer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['customer_id', 'customer_name', 'c_address1', 'c_address2', 'c_address3', 'c_contactno', 'c_email', 'status', 'remark', 'C_By', 'C_Date', 'M_By', 'M_Date'], 'safe'],
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
        $query = Mstcustomer::find();

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
            'C_Date' => $this->C_Date,
            'M_Date' => $this->M_Date,
        ]);

        $query->andFilterWhere(['like', 'customer_id', $this->customer_id])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'c_address1', $this->c_address1])
            ->andFilterWhere(['like', 'c_address2', $this->c_address2])
            ->andFilterWhere(['like', 'c_address3', $this->c_address3])
            ->andFilterWhere(['like', 'c_contactno', $this->c_contactno])
            ->andFilterWhere(['like', 'c_email', $this->c_email])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'C_By', $this->C_By])
            ->andFilterWhere(['like', 'M_By', $this->M_By]);

        return $dataProvider;
    }
}
