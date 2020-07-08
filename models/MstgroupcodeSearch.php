<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mstgroupcode;

/**
 * MstgroupcodeSearch represents the model behind the search form about `app\models\Mstgroupcode`.
 */
class MstgroupcodeSearch extends Mstgroupcode
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GroupCodeName', 'Code', 'CodedDesc', 'ExtraInfo', 'Logic', 'Status', 'UserEdit', 'CBy', 'CDate', 'MBy', 'MDate'], 'safe'],
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
        $query = Mstgroupcode::find()->Where(['<>','GroupCodeName','RejectReason']); //Samsad: Users are not allowed to view or edit job reject reasons.

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
            'CDate' => $this->CDate,
            'MDate' => $this->MDate,
        ]);

        $query->andFilterWhere(['like', 'GroupCodeName', $this->GroupCodeName])
            ->andFilterWhere(['like', 'Code', $this->Code])
            ->andFilterWhere(['like', 'CodedDesc', $this->CodedDesc])
            ->andFilterWhere(['like', 'ExtraInfo', $this->ExtraInfo])
            ->andFilterWhere(['like', 'Logic', $this->Logic])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'UserEdit', $this->UserEdit])
            ->andFilterWhere(['like', 'CBy', $this->CBy])
            ->andFilterWhere(['like', 'MBy', $this->MBy]);

        return $dataProvider;
    }
}
