<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bookinggroups;

/**
 * BookinggroupsSearch represents the model behind the search form about `app\models\Bookinggroups`.
 */
class BookinggroupsSearch extends Bookinggroups
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'groups', 'req_qty', 'avl_qty'], 'integer'],
            [['movetype', 'vehicletype', 'size', 'type', 'bref_no', 'Arrival_date', 'From_date', 'To_date', 'remarks', 'status', 'c_by', 'c_date', 'm_by', 'm_date'], 'safe'],
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
        $query = Bookinggroups::find();

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
            'groups' => $this->groups,
            'req_qty' => $this->req_qty,
            'avl_qty' => $this->avl_qty,
            'Arrival_date' => $this->Arrival_date,
            'From_date' => $this->From_date,
            'To_date' => $this->To_date,
            'c_date' => $this->c_date,
            'm_date' => $this->m_date,
        ]);

        $query->andFilterWhere(['like', 'movetype', $this->movetype])
            ->andFilterWhere(['like', 'vehicletype', $this->vehicletype])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'bref_no', $this->bref_no])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'c_by', $this->c_by])
            ->andFilterWhere(['like', 'm_by', $this->m_by]);

        return $dataProvider;
    }
}
