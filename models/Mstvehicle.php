<?php

namespace app\models;
use yii\behaviors\AttributeBehavior;
use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "mstvehicle".
 *
 * @property integer $TableId
 * @property string $VehicleCode
 * @property string $VehicleDesc
 * @property string $VehicleName
 * @property string $VehicleType
 * @property string $VehicleRegNo
 * @property string $VehicleEngNo
 * @property string $BrandName
 * @property string $YearOfMFG
 * @property string $MakeModel
 * @property string $ChesisNo
 * @property string $LadenWight
 * @property string $UnLadenWight
 * @property string $RoadTaxFrom
 * @property string $RoadTaxTo
 * @property string $RoadTaxDue
 * @property string $InsurFrom
 * @property string $InsurTo
 * @property string $InsurDue
 * @property string $CurrentLocation
 * @property string $PermitFrom
 * @property string $PermitTo
 * @property string $VPCFrom
 * @property string $VPCTo
 * @property string $ROBDate
 * @property string $AssignTo
 * @property string $AssignBy
 * @property string $AssignDate
 * @property string $LoadingCapacity
 * @property string $VehicleCondition
 * @property string $VehicleStatus
 * @property string $Remark
 * @property string $CBy
 * @property string $CDate
 * @property string $MBy
 * @property string $MDate
 * @property string $Status
 */
class Mstvehicle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
	public $psize;
	public $pvehicledesc;
	
    public static function tableName()
    {
        return 'mstvehicle';
    }
	
	public function behaviors()
{
    return [
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                // update 1 attribute 'created' OR multiple attribute ['created','updated']
                ActiveRecord::EVENT_BEFORE_INSERT => ['RegDate','EffDateOwner','COEExpiry','last_date_insp','insp_duedate','insp_flagdate','RoadTaxFrom','RoadTaxTo','RoadTaxDue',
				'last_date_of_roadtax','InsurFrom','InsurTo','InsurDue','PermitFrom','PermitTo','VPCFrom','VPCTo','last_date_of_vpc','ROBDate'],
                ActiveRecord::EVENT_BEFORE_UPDATE => ['RegDate','EffDateOwner','COEExpiry','last_date_insp','insp_duedate','insp_flagdate','RoadTaxFrom','RoadTaxTo','RoadTaxDue',
				'last_date_of_roadtax','InsurFrom','InsurTo','InsurDue','PermitFrom','PermitTo','VPCFrom','VPCTo','last_date_of_vpc','ROBDate'],
            ],
            'value' => function ($event) {
                return date('dd-m-yyyy', strtotime($this->PermitFrom));
				 return date('dd-m-yyyy', strtotime($this->PermitTo));
            },
        ],
    ];
}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CompCode','VehicleRegNo','VehicleDesc', 'VehicleType','VehicleJobType','VehicleStatus','Size'], 'required','message'=>''],
            [['RoadTaxFrom', 'RoadTaxTo', 'RoadTaxDue', 'InsurFrom', 'VehicleJobType' ,'InsurTo', 'InsurDue', 'PermitFrom', 'PermitTo', 'VPCFrom', 'VPCTo', 'ROBDate', 'AssignDate', 'CDate', 'MDate','CompCode','TrailerStatus'], 'safe'],
            //[['VehicleCode'], 'string', 'max' => 25],
            [['VehicleDesc', 'BrandName', 'MakeModel', 'LoadingCapacity', 'VehicleCondition', 'Remark'], 'string', 'max' => 50],
            [['VehicleName', 'VehicleType', 'VehicleRegNo', 'VehicleEngNo', 'LadenWight', 'UnLadenWight', 'CurrentLocation', 'CBy', 'MBy'], 'string', 'max' => 30],
            [['YearOfMFG'], 'string', 'max' => 22],
            [['VehicleStatus', 'Status'], 'string', 'max' => 3],
            [['RoadTaxFrom', 'RoadTaxTo', 'RoadTaxDue', 'InsurFrom', 'InsurTo', 'InsurDue', 'PermitFrom', 'PermitTo', 'VPCFrom', 'VPCTo', 'ROBDate'], 'validateDates'],
        ];
    }
	



    public function validateDates(){
    if($this->RoadTaxTo){
    if(strtotime($this->RoadTaxTo) <= strtotime($this->RoadTaxFrom)){
        $this->addError('RoadTaxFrom','');
        $this->addError('RoadTaxFrom','');
    }
    }if($this->InsurTo){
       if(strtotime($this->InsurTo) <= strtotime($this->InsurFrom)){
        $this->addError('InsurFrom','');
        $this->addError('InsurTo','');
    }
     }if($this->PermitTo){
    if(strtotime($this->PermitTo) <= strtotime($this->PermitFrom)){
        $this->addError('PermitFrom','');
        $this->addError('PermitTo','');
    }
    
     }if($this->VPCTo){
    if(strtotime($this->VPCTo) <= strtotime($this->VPCFrom)){
        $this->addError('VPCFrom','');
        $this->addError('VPCTo','');
    }
    
     }
}
            public function getVehicledesc()
            {
              return $this->hasOne(Mstgroupcode::className(),['code'=>'VehicleDesc']);
            }
            public function getVehicletype()
            {
              return $this->hasOne(Mstgroupcode::className(),['code'=>'VehicleType']);
            }
             public function getLocation()
            {
              return $this->hasOne(Mstlocation::className(),['LocCode'=>'CurrentLocation']);
            }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TableId' => 'Table ID',
            'CompCode' => 'CompName',
			'psize'=>'',
			'pvehicledesc'=>'',			
            'VehicleDesc' => '',
			'Size'=>'',
            'VehicleName' => 'Name',
            'VehicleType' => 'VehicleType',
            'VehicleJobType'=>'VehicleJobType',
            'VehicleRegNo' => 'RegNo',
            'VehicleEngNo' => 'EngNo',
            'BrandName' => 'BrandName',
            'YearOfMFG' => 'YearOfMfg',
            'MakeModel' => 'MakeModel',
            'ChesisNo' => 'ChesisNo',
            'LadenWight' => 'LadenWight',
            'UnLadenWight' => 'UnLadenWight',
            'RoadTaxFrom' => 'RoadTaxFrom',
            'RoadTaxTo' => 'RoadTaxTo',
            'RoadTaxDue' => 'RoadTaxDue',
            'InsurFrom' => 'InsurFrom',
            'InsurTo' => 'InsurTo',
            'InsurDue' => 'InsurDue',
            'CurrentLocation' => 'CurrentLocation',
            'PermitFrom' => 'PermitFrom',
            'PermitTo' => 'PermitTo',
            'VPCFrom' => 'VpcFrom',
            'VPCTo' => 'VpcTo',
            'ROBDate' => 'Robdate',
            'AssignTo' => 'AssignTo',
            'AssignBy' => 'AssignBy',
            'AssignDate' => 'AssignDate',
            'LoadingCapacity' => 'LoadingCapacity',
            'VehicleCondition' => 'VehicleCondition',
            'VehicleStatus' => 'VehicleStatus',
            'Remark' => 'Remark',
            'CBy' => 'Cby',
            'CDate' => 'Cdate',
            'MBy' => 'Mby',
            'MDate' => 'Mdate',
            'Status' => 'Status',
        ];
    }
    
   
    

    /**
     * @inheritdoc
     * @return MstvehicleQuery the active query used by this AR class.
     */
    /*public static function find()
    {
        return new MstvehicleQuery(get_called_class());
    }*/
}
