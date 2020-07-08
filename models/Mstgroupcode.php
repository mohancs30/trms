<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mstgroupcode".
 *
 * @property integer $MstGroupId
 * @property string $GroupCodeName
 * @property string $Code
 * @property string $CodedDesc
 * @property string $ExtraInfo
 * @property string $Logic
 * @property string $Status
 * @property string $UserEdit
 * @property string $CBy
 * @property string $CDate
 * @property string $MBy
 * @property string $MDate
 */
class Mstgroupcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'mstgroupcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GroupCodeName', 'Code', 'CodedDesc'], 'required'],
            [['CDate', 'MDate'], 'safe'],
            [['GroupCodeName'], 'string', 'max' => 30],
            [['Code'], 'string', 'max' => 20],
            [['CodedDesc'], 'string', 'max' => 50],
            [['ExtraInfo'], 'string', 'max' => 55],
            [['Logic'], 'string', 'max' => 10],
            [['Status'], 'string', 'max' => 5],
            [['UserEdit'], 'string', 'max' => 3],
            [['CBy', 'MBy'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MstGroupId' => 'Mst Group ID',
            'GroupCodeName' => 'Group Code Name',
            'Code' => 'Code',
            'CodedDesc' => 'Coded Desc',
            'ExtraInfo' => 'Extra Info',
            'Logic' => 'Logic',
            'Status' => 'Status',
            'UserEdit' => 'User Edit',
            'CBy' => 'Cby',
            'CDate' => 'Cdate',
            'MBy' => 'Mby',
            'MDate' => 'Mdate',
        ];
    }
}




