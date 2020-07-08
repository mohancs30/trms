<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mstcompany;

/**
 * MstcompanySearch represents the model behind the search form about `app\models\Mstcompany`.
 */
class MstcompanySearch extends Mstcompany
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TableId'], 'integer'],
            [['CompCode', 'CompRegNo', 'CompName1', 'CompName2', 'ShortName', 'CompGstNo', 'ContactPerson', 'PhoneNo1', 'PhoneNo2', 'MobileNo', 'FaxNo', 'CurrencyCode', 'CountryCode', 'EmailID', 'WebSite', 'Address11', 'Address12', 'Address13', 'PostalCode1', 'Address21', 'Address22', 'Address23', 'PostalCode2', 'CBy', 'CDate', 'MBy', 'MDate', 'Status'], 'safe'],
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
        $query = Mstcompany::find();

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
            'CDate' => $this->CDate,
            'MDate' => $this->MDate,
        ]);

        $query->andFilterWhere(['like', 'CompCode', $this->CompCode])
            ->andFilterWhere(['like', 'CompRegNo', $this->CompRegNo])
            ->andFilterWhere(['like', 'CompName1', $this->CompName1])
            ->andFilterWhere(['like', 'CompName2', $this->CompName2])
            ->andFilterWhere(['like', 'ShortName', $this->ShortName])
            ->andFilterWhere(['like', 'CompGstNo', $this->CompGstNo])
            ->andFilterWhere(['like', 'ContactPerson', $this->ContactPerson])
            ->andFilterWhere(['like', 'PhoneNo1', $this->PhoneNo1])
            ->andFilterWhere(['like', 'PhoneNo2', $this->PhoneNo2])
            ->andFilterWhere(['like', 'MobileNo', $this->MobileNo])
            ->andFilterWhere(['like', 'FaxNo', $this->FaxNo])
            ->andFilterWhere(['like', 'CurrencyCode', $this->CurrencyCode])
            ->andFilterWhere(['like', 'CountryCode', $this->CountryCode])
            ->andFilterWhere(['like', 'EmailID', $this->EmailID])
            ->andFilterWhere(['like', 'WebSite', $this->WebSite])
            ->andFilterWhere(['like', 'Address11', $this->Address11])
            ->andFilterWhere(['like', 'Address12', $this->Address12])
            ->andFilterWhere(['like', 'Address13', $this->Address13])
            ->andFilterWhere(['like', 'PostalCode1', $this->PostalCode1])
            ->andFilterWhere(['like', 'Address21', $this->Address21])
            ->andFilterWhere(['like', 'Address22', $this->Address22])
            ->andFilterWhere(['like', 'Address23', $this->Address23])
            ->andFilterWhere(['like', 'PostalCode2', $this->PostalCode2])
            ->andFilterWhere(['like', 'CBy', $this->CBy])
            ->andFilterWhere(['like', 'MBy', $this->MBy])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
