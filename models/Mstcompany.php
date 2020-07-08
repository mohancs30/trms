<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mstcompany".
 *
 * @property integer $TableId
 * @property string $CompCode
 * @property string $CompRegNo
 * @property string $CompName1
 * @property string $CompName2
 * @property string $ShortName
 * @property string $CompGstNo
 * @property integer $GST
 * @property string $ContactPerson
 * @property string $PhoneNo1
 * @property string $PhoneNo2
 * @property string $MobileNo
 * @property string $FaxNo
 * @property string $CurrencyCode
 * @property string $CountryCode
 * @property string $EmailID
 * @property string $WebSite
 * @property string $Address11
 * @property string $Address12
 * @property string $Address13
 * @property string $PostalCode1
 * @property string $Address21
 * @property string $Address22
 * @property string $Address23
 * @property string $PostalCode2
 * @property string $CBy
 * @property string $CDate
 * @property string $MBy
 * @property string $MDate
 * @property string $Status
 */
class Mstcompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mstcompany';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
              [['CompCode',  'CompName1','Address11', 'Address12', 'Address13','PostalCode1','PhoneNo1','MobileNo','EmailID','CompRegNo', 'CompGstNo' ,'GST'], 'required','message'=>''],
            [['GST'], 'integer'],
            [['CDate', 'MDate'], 'safe'],
            [['CompCode', 'CountryCode', 'PostalCode1', 'PostalCode2'], 'string', 'max' => 10],
            [['CompRegNo', 'CompGstNo', 'FaxNo', 'CBy', 'MBy'], 'string', 'max' => 12, 'message'=>''],
            [['CompName1', 'CompName2', 'ContactPerson', 'EmailID', 'WebSite', 'Address11', 'Address12', 'Address21', 'Address22'], 'string', 'max' => 50],
            [['ShortName', 'Address13', 'Address23'], 'string', 'max' => 30],
            [['PhoneNo1', 'PhoneNo2', 'MobileNo'], 'string', 'max' => 22],
            [['CurrencyCode'], 'string', 'max' => 15],
            [['Status'], 'string', 'max' => 5],
            
            [['PhoneNo1', 'PhoneNo2', 'MobileNo', 'FaxNo',], 'match', 'pattern' => '/^([+]?[0-9 ]){0,15}$/','message'=>''],
          /*  [['CompName1', 'CompName2'], 'match', 'pattern' => '/^[a-zA-Z0-9 ]{0,50}$/','message'=>''],*/
            [['ShortName',], 'match', 'pattern' => '/^[a-zA-Z0-9 ]{0,30}$/','message'=>''],
            [['GST',], 'match', 'pattern' => '/^[0-9 ]{0,1}$/','message'=>''],
        ];
    }
 /* This Function is get the codede value in the Grid View*/ 
    
    public function getEmpName()
        {
            return $this->hasone(Mstemployee::className(),['EmpCode'=>'ContactPerson']);
        }
    public function getCountrycode()
        {
            return $this->hasone(Mstcountrycode::className(),['CountryCode'=>'CountryCode']);
        }
    public function getCurrencycode()
        {
            return $this->hasone(Mstcurrencycode::className(),['CurrencyCode'=>'CurrencyCode']);
        }
   
    /**
     * @inheritdoc
     */
   public function attributeLabels()
    {
        return [
            'TableId' => 'Table ID',
            'CompCode' => 'Code',
            'CompRegNo' => 'RegNo',
            'CompName1' => 'Name',
            'CompName2' => 'SecondName',
            'ShortName' => 'ShortName',
            'CompGstNo' => 'GSTNo',
            'GST' => 'GST%',
            'ContactPerson' => 'ContactPerson',
            'PhoneNo1' => 'PhoneNo1',
            'PhoneNo2' => 'PhoneNo2',
            'MobileNo' => 'MobileNo',
            'FaxNo' => 'FaxNo',
            'CurrencyCode' => 'Currency',
            'CountryCode' => 'Country',
            'EmailID' => 'EmailID',
            'WebSite' => 'WebSite',
            'Address11' => 'Address1',
            'Address12' => 'City',
            'Address13' => 'Country',
            'PostalCode1' => 'PostalCode',
            'Address21' => 'Address2',
            'Address22' => 'City',
            'Address23' => 'Country',
            'PostalCode2' => 'PostalCode',
            'CBy' => 'Cby',
            'CDate' => 'Cdate',
            'MBy' => 'Mby',
            'MDate' => 'Mdate',
            'Status' => 'Status',
        ];
    }
}
