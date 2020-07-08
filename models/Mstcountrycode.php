<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mstcountrycode".
 *
 * @property integer $TableId
 * @property string $CountryCode
 * @property string $CountryName
 * @property string $ShortName
 * @property string $Remark
 * @property string $CBy
 * @property string $CDate
 * @property string $MBy
 * @property string $MDate
 * @property string $Status
 */
class Mstcountrycode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mstcountrycode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'CountryCode', 'CountryName'], 'required', 'message'=>''],
            [['TableId'], 'integer'],
            [['CDate', 'MDate'], 'safe'],
            [['CountryCode'], 'string', 'max' => 25],
            [['CountryName'], 'string', 'max' => 50],
            [['ShortName', 'CBy', 'MBy'], 'string', 'max' => 30],
            [['Remark'], 'string', 'max' => 150],
            [['Status'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TableId' => 'Table ID',
            'CountryCode' => 'Code',
            'CountryName' => 'Name',
            'ShortName' => 'ShortName',
            'Remark' => 'Remark',
            'CBy' => 'Cby',
            'CDate' => 'Cdate',
            'MBy' => 'Mby',
            'MDate' => 'Mdate',
            'Status' => 'Status',
        ];
    }
}
