<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mstlocation;

/**
 * MstlocationSearch represents the model behind the search form about `app\models\Mstlocation`.
 */
class MstlocationSearch extends Mstlocation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TableId'], 'integer'],
            [['LocCode', 'LocName', 'LocSecondName', 'LocType', 'LocGroup','Outskirt','CustOutskirt','ContactPerson', 'PhoneNo1', 'PhoneNo2', 'MobileNo', 'FaxNo', 'EmailId', 'Address1', 'Address2', 'Address3', 'PostalCode', 'LocStatus', 'Remark', 'CBy', 'CDate', 'MBy', 'MDate', 'Status'], 'safe'],
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
        $query = Mstlocation::find();

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
            'TableId' => $this->TableId,
            'CDate' => $this->CDate,
            'MDate' => $this->MDate,
        ]);

        $query->andFilterWhere(['like', 'LocCode', $this->LocCode])
            ->andFilterWhere(['like', 'LocName', $this->LocName])
            ->andFilterWhere(['like', 'LocSecondName', $this->LocSecondName])
            ->andFilterWhere(['like', 'LocType', $this->LocType])
             ->andFilterWhere(['like', 'LocGroup', $this->LocGroup])
             ->andFilterWhere(['like', 'Outskirt', $this->Outskirt])
            ->andFilterWhere(['like', 'CustOutskirt', $this->CustOutskirt])
            ->andFilterWhere(['like', 'ContactPerson', $this->ContactPerson])
            ->andFilterWhere(['like', 'PhoneNo1', $this->PhoneNo1])
            ->andFilterWhere(['like', 'PhoneNo2', $this->PhoneNo2])
            ->andFilterWhere(['like', 'MobileNo', $this->MobileNo])
            ->andFilterWhere(['like', 'FaxNo', $this->FaxNo])
            ->andFilterWhere(['like', 'EmailId', $this->EmailId])
            ->andFilterWhere(['like', 'Address1', $this->Address1])
            ->andFilterWhere(['like', 'Address2', $this->Address2])
            ->andFilterWhere(['like', 'Address3', $this->Address3])
            ->andFilterWhere(['like', 'PostalCode', $this->PostalCode])
            ->andFilterWhere(['like', 'LocStatus', $this->LocStatus])
            ->andFilterWhere(['like', 'Remark', $this->Remark])
            ->andFilterWhere(['like', 'CBy', $this->CBy])
            ->andFilterWhere(['like', 'MBy', $this->MBy])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
