<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Booking;

/**
 * BookingSearch represents the model behind the search form of `app\models\Booking`.
 */
class BookingSearch extends Booking
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Qty'], 'integer'],
            [['B_id','Movetype','VehicleRegNo','bookingref_no','Arrivaltime','VehicleRegNo','Fromdate','Todate', 'status', 'Remarks','C_date', 'C_By', 'M_date', 'M_By'], 'safe'],
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
        $query = Booking::find();
		
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
             //$query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'B_id' => $this->B_id,
			'VehicleRegNo'=>$this->VehicleRegNo,
			'bookingref_no'=>$this->bookingref_no,
			'Fromdate'=>$this->Fromdate,
			'Todate'=>$this->Todate,
            'Qty' => $this->Qty,
            'C_date' => $this->C_date,
			'C_by' => $this->C_date,
            'M_date' => $this->M_date,
        ]);

        $query->andFilterWhere(['like', 'Movetype', $this->Movetype])
            ->andFilterWhere(['like', 'VehicleRegNo', $this->VehicleRegNo])
			->andFilterWhere(['like', 'bookingref_no', $this->bookingref_no])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'Remarks', $this->Remarks])
            ->andFilterWhere(['like', 'C_By', $this->C_By])
            ->andFilterWhere(['like', 'M_By', $this->M_By]);
		
        return $dataProvider;
    }
}
