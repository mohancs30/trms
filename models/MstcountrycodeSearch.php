<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mstcountrycode;

/**
 * MstcountrycodeSearch represents the model behind the search form about `app\models\Mstcountrycode`.
 */
class MstcountrycodeSearch extends Mstcountrycode
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TableId'], 'integer'],
            [['CountryCode', 'CountryName', 'ShortName', 'Remark', 'CBy', 'CDate', 'MBy', 'MDate', 'Status'], 'safe'],
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
        $query = Mstcountrycode::find();

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

        $query->andFilterWhere(['like', 'CountryCode', $this->CountryCode])
            ->andFilterWhere(['like', 'CountryName', $this->CountryName])
            ->andFilterWhere(['like', 'ShortName', $this->ShortName])
            ->andFilterWhere(['like', 'Remark', $this->Remark])
            ->andFilterWhere(['like', 'CBy', $this->CBy])
            ->andFilterWhere(['like', 'MBy', $this->MBy])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
