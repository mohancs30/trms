<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mstlocation".
 *
 * @property integer $TableId
 * @property string $LocCode
 * @property string $LocName
 * @property string $LocSecondName
 * @property string $LocType
 * @property string $ContactPerson
 * @property string $PhoneNo1
 * @property string $PhoneNo2
 * @property string $MobileNo
 * @property string $FaxNo
 * @property string $EmailId
 * @property string $Address1
 * @property string $Address2
 * @property string $Address3
 * @property string $PostalCode
 * @property string $LocStatus
 * @property string $Remark
 * @property string $CBy
 * @property string $CDate
 * @property string $MBy
 * @property string $MDate
 * @property string $Status
 */
class Mstlocation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'mstlocation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'LocCode', 'LocName','LocGroup','Outskirt','CustOutskirt','LocStatus'], 'required' ,'message'=>''],
            [['TableId'], 'integer'],
            [['CDate', 'MDate', 'LocGroup', 'Outskirt'], 'safe'],
            [['LocCode'], 'string', 'max' => 25],
            [['LocName', 'LocSecondName', 'LocType', 'ContactPerson', 'EmailId', 'Address1', 'Address2', 'Address3', 'PostalCode', 'Remark'], 'string', 'max' => 50],
            [['PhoneNo1', 'PhoneNo2', 'MobileNo', 'FaxNo'], 'string', 'max' => 22,'message'=>''],
            [['LocStatus', 'Status'], 'string', 'max' => 5],
            [['CBy', 'MBy'], 'string', 'max' => 30],
            
            ['EmailId', 'email','message'=>''],
            [['PhoneNo1', 'PhoneNo2', 'MobileNo', 'FaxNo',], 'match', 'pattern' => '/^([+]?[0-9 ]){0,11}$/','message'=>''],
            
            ];
    }


        public function getLocationtype()
            {
             return $this->hasOne(Mstgroupcode::className(),['code'=>'LocType']);
            }
        public function getLocationgroup()
            {
             return $this->hasOne(Mstgroupcode::className(),['code'=>'LocGroup']);
            }   
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TableId' => 'Table ID',
            'LocCode' => 'Code',
            'LocName' => 'Name',
            'LocSecondName' => 'SecondName',
            'LocType' => 'LocationType',
            'LocGroup'=>'Location Group',
            'Outskirt'=>'Outskirt',
            'ContactPerson' => 'ContactPerson',
            'PhoneNo1' => 'PhoneNo1',
            'PhoneNo2' => 'PhoneNo2',
            'MobileNo' => 'MobileNo',
            'FaxNo' => 'FaxNo',
            'EmailId' => 'EmailID',
            'Address1' => 'Address1',
            'Address2' => 'City',
            'Address3' => 'Country',
            'PostalCode' => 'PostalCode',
            'LocStatus' => 'Status',
            'Remark' => 'Remark',
            'CBy' => 'Cby',
            'CDate' => 'Cdate',
            'MBy' => 'Mby',
            'MDate' => 'Mdate',
            'Status' => 'Status',
        ];
    }
}
