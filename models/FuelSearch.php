<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fuel;

/**
 * Fuelsearch represents the model behind the search form about `app\models\Fuel`.
 */
class Fuelsearch extends Fuel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ltr_price'], 'integer'],
            [['vehicleregno', 'vehicletype', 'vehicle_desc', 'fuel_date', 'fuel_station', 'mtr_read', 'ltr_pump', 'fill_type', 'last_milage', 'driver', 'c_by', 'c_date', 'm_by', 'm_date', 'status', 'remark'], 'safe'],
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
        $query = Fuel::find();

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
            'fuel_date' => $this->fuel_date,
            'ltr_price' => $this->ltr_price,
            'c_date' => $this->c_date,
            'm_date' => $this->m_date,
        ]);

        $query->andFilterWhere(['like', 'vehicleregno', $this->vehicleregno])
            ->andFilterWhere(['like', 'vehicletype', $this->vehicletype])
            ->andFilterWhere(['like', 'vehicle_desc', $this->vehicle_desc])
            ->andFilterWhere(['like', 'fuel_station', $this->fuel_station])
            ->andFilterWhere(['like', 'mtr_read', $this->mtr_read])
            ->andFilterWhere(['like', 'ltr_pump', $this->ltr_pump])
            ->andFilterWhere(['like', 'fill_type', $this->fill_type])
            ->andFilterWhere(['like', 'last_milage', $this->last_milage])
            ->andFilterWhere(['like', 'driver', $this->driver])
            ->andFilterWhere(['like', 'c_by', $this->c_by])
            ->andFilterWhere(['like', 'm_by', $this->m_by])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
