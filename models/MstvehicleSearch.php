<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mstvehicle;

/**
 * MstvehicleSearch represents the model behind the search form about `app\models\Mstvehicle`.
 */
class MstvehicleSearch extends Mstvehicle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['TableId'], 'integer'],
            [[ 'CompCode','VehicleDesc', 'VehicleName', 'VehicleType', 'VehicleRegNo', 'VehicleEngNo', 'BrandName', 'YearOfMFG', 'MakeModel', 'ChassisNo', 'UsageType','LadenWight', 'UnLadenWight', 'RoadTaxFrom', 'RoadTaxTo', 'RoadTaxDue', 'InsurFrom', 'InsurTo', 'InsurDue', 'CurrentLocation', 'PermitFrom', 'PermitTo', 'VPCFrom', 'VPCTo', 'ROBDate',  'LoadingCapacity', 'VehicleCondition', 'VehicleStatus', 'IUNo','MDTNo','Remark', 'CBy', 'CDate', 'MBy', 'MDate', 'Status'], 'safe'],
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
        $query = Mstvehicle::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 50, ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
           // 'TableId' => $this->TableId,
            'RoadTaxFrom' => $this->RoadTaxFrom,
            'RoadTaxTo' => $this->RoadTaxTo,
            'RoadTaxDue' => $this->RoadTaxDue,
            'InsurFrom' => $this->InsurFrom,
            'InsurTo' => $this->InsurTo,
            'InsurDue' => $this->InsurDue,
            'PermitFrom' => $this->PermitFrom,
            'PermitTo' => $this->PermitTo,
            'VPCFrom' => $this->VPCFrom,
            'VPCTo' => $this->VPCTo,
            'ROBDate' => $this->ROBDate,
            'CDate' => $this->CDate,
            'MDate' => $this->MDate,
        ]);

        $query->andFilterWhere(['like', 'CompCode', $this->CompCode])
            ->andFilterWhere(['like', 'VehicleRegNo', $this->VehicleRegNo])
            ->andFilterWhere(['like', 'VehicleDesc', $this->VehicleDesc])
            ->andFilterWhere(['like', 'VehicleName', $this->VehicleName])
            ->andFilterWhere(['like', 'VehicleType', $this->VehicleType])
            ->andFilterWhere(['like', 'VehicleEngNo', $this->VehicleEngNo])
            ->andFilterWhere(['like', 'BrandName', $this->BrandName])
            ->andFilterWhere(['like', 'YearOfMFG', $this->YearOfMFG])
            ->andFilterWhere(['like', 'MakeModel', $this->MakeModel])
            ->andFilterWhere(['like', 'ChassisNo', $this->ChassisNo])
            ->andFilterWhere(['like', 'UsageType', $this->LadenWight])
            ->andFilterWhere(['like', 'LadenWight', $this->LadenWight])
            ->andFilterWhere(['like', 'UnLadenWight', $this->UnLadenWight])
            ->andFilterWhere(['like', 'CurrentLocation', $this->CurrentLocation])
            ->andFilterWhere(['like', 'LoadingCapacity', $this->LoadingCapacity])
            ->andFilterWhere(['like', 'VehicleCondition', $this->VehicleCondition])
            ->andFilterWhere(['like', 'VehicleStatus', $this->VehicleStatus])
            ->andFilterWhere(['like', 'Remark', $this->Remark])
            ->andFilterWhere(['like', 'IUNo', $this->IUNo])
            ->andFilterWhere(['like', 'MDTNo', $this->MDTNo])
            ->andFilterWhere(['like', 'CBy', $this->CBy])
            ->andFilterWhere(['like', 'MBy', $this->MBy])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
