<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mstcharges".
 *
 * @property int $id
 * @property string $vechicletype
 * @property int $amount
 * @property string $status
 * @property string $remarks
 * @property string $CBy
 * @property string $MBy
 * @property string|null $Cdate
 * @property string $Mdate
 */
class Mstcharges extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mstcharges';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vechicletype', 'amount', 'status', 'remarks', 'CBy', 'MBy'], 'required'],
            [['id', 'amount'], 'integer'],
            [['status'], 'string'],
            [['Cdate', 'Mdate'], 'safe'],
            [['vechicletype'], 'string', 'max' => 10],
            [['remarks', 'CBy', 'MBy'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vechicletype' => 'Vechicletype',
            'amount' => 'Amount',
            'status' => 'Status',
            'remarks' => 'Remarks',
            'CBy' => 'C By',
            'MBy' => 'M By',
            'Cdate' => 'Cdate',
            'Mdate' => 'Mdate',
        ];
    }
}
