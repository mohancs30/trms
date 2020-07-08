<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mstemployee;

/**
 * MstempSearch represents the model behind the search form of `app\models\Mstemployee`.
 */
class MstempSearch extends Mstemployee
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TableId'], 'integer'],
            [['EmpCode', 'EmpName', 'ShortName', 'CompCode', 'EmpIcNo', 'Department', 'Designation', 'EmpContactPerson', 'PhoneNo1', 'MobileNo1', 'MobileNo2', 'FaxNo', 'DOJ', 'DOB', 'DOL', 'EmailID', 'DrivLicNo', 'DrivLicType', 'DrivLicIssDate', 'DrivLicExpDate', 'Nationality', 'EmpPhoto', 'Address11', 'Address12', 'Address13', 'PostalCode1', 'Address21', 'Address22', 'Address23', 'PostalCode2', 'EmpStatus', 'CBy', 'CDate', 'MBy', 'MDate', 'UserStatus', 'DriverStatus'], 'safe'],
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
        $query = Mstemployee::find();

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
            'TableId' => $this->TableId,
            'DOJ' => $this->DOJ,
            'DOB' => $this->DOB,
            'DOL' => $this->DOL,
            'DrivLicIssDate' => $this->DrivLicIssDate,
            'DrivLicExpDate' => $this->DrivLicExpDate,
            'CDate' => $this->CDate,
            'MDate' => $this->MDate,
        ]);

        $query->andFilterWhere(['like', 'EmpCode', $this->EmpCode])
            ->andFilterWhere(['like', 'EmpName', $this->EmpName])
            ->andFilterWhere(['like', 'ShortName', $this->ShortName])
            ->andFilterWhere(['like', 'CompCode', $this->CompCode])
            ->andFilterWhere(['like', 'EmpIcNo', $this->EmpIcNo])
            ->andFilterWhere(['like', 'Department', $this->Department])
            ->andFilterWhere(['like', 'Designation', $this->Designation])
            ->andFilterWhere(['like', 'EmpContactPerson', $this->EmpContactPerson])
            ->andFilterWhere(['like', 'PhoneNo1', $this->PhoneNo1])
            ->andFilterWhere(['like', 'MobileNo1', $this->MobileNo1])
            ->andFilterWhere(['like', 'MobileNo2', $this->MobileNo2])
            ->andFilterWhere(['like', 'FaxNo', $this->FaxNo])
            ->andFilterWhere(['like', 'EmailID', $this->EmailID])
            ->andFilterWhere(['like', 'DrivLicNo', $this->DrivLicNo])
            ->andFilterWhere(['like', 'DrivLicType', $this->DrivLicType])
            ->andFilterWhere(['like', 'Nationality', $this->Nationality])
            ->andFilterWhere(['like', 'EmpPhoto', $this->EmpPhoto])
            ->andFilterWhere(['like', 'Address11', $this->Address11])
            ->andFilterWhere(['like', 'Address12', $this->Address12])
            ->andFilterWhere(['like', 'Address13', $this->Address13])
            ->andFilterWhere(['like', 'PostalCode1', $this->PostalCode1])
            ->andFilterWhere(['like', 'Address21', $this->Address21])
            ->andFilterWhere(['like', 'Address22', $this->Address22])
            ->andFilterWhere(['like', 'Address23', $this->Address23])
            ->andFilterWhere(['like', 'PostalCode2', $this->PostalCode2])
            ->andFilterWhere(['like', 'EmpStatus', $this->EmpStatus])
            ->andFilterWhere(['like', 'CBy', $this->CBy])
            ->andFilterWhere(['like', 'MBy', $this->MBy])
            ->andFilterWhere(['like', 'UserStatus', $this->UserStatus])
            ->andFilterWhere(['like', 'DriverStatus', $this->DriverStatus]);

        return $dataProvider;
    }
}
