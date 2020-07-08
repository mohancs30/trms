<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mstemployee".
 *
 * @property int $TableId
 * @property string $EmpCode
 * @property string $EmpName
 * @property string|null $ShortName
 * @property string|null $CompCode
 * @property string|null $EmpIcNo
 * @property string|null $Department
 * @property string|null $Designation
 * @property string|null $EmpContactPerson
 * @property string|null $PhoneNo1
 * @property string|null $MobileNo1
 * @property string|null $MobileNo2
 * @property string|null $FaxNo
 * @property string|null $DOJ
 * @property string|null $DOB
 * @property string|null $DOL
 * @property string|null $EmailID
 * @property string|null $DrivLicNo
 * @property string|null $DrivLicType
 * @property string|null $DrivLicIssDate
 * @property string|null $DrivLicExpDate
 * @property string|null $Nationality
 * @property string|null $EmpPhoto
 * @property string|null $Address11
 * @property string|null $Address12
 * @property string|null $Address13
 * @property string|null $PostalCode1
 * @property string|null $Address21
 * @property string|null $Address22
 * @property string|null $Address23
 * @property string|null $PostalCode2
 * @property string|null $EmpStatus
 * @property string|null $CBy
 * @property string|null $CDate
 * @property string|null $MBy
 * @property string|null $MDate
 * @property string|null $UserStatus
 * @property string|null $DriverStatus
 */
class Mstemployee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mstemployee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TableId', 'EmpCode', 'EmpName'], 'required'],
            [['TableId'], 'integer'],
            [['DOJ', 'DOB', 'DOL', 'DrivLicIssDate', 'DrivLicExpDate', 'CDate', 'MDate'], 'safe'],
            [['EmpCode', 'FaxNo', 'PostalCode1', 'PostalCode2', 'CBy', 'MBy'], 'string', 'max' => 12],
            [['EmpName', 'EmpContactPerson', 'EmailID', 'Address11', 'Address12', 'Address21', 'Address22'], 'string', 'max' => 50],
            [['ShortName', 'Address13', 'Address23'], 'string', 'max' => 30],
            [['CompCode', 'EmpIcNo', 'DriverStatus'], 'string', 'max' => 10],
            [['Department', 'Designation', 'DrivLicNo', 'DrivLicType'], 'string', 'max' => 20],
            [['PhoneNo1', 'MobileNo1', 'MobileNo2'], 'string', 'max' => 22],
            [['Nationality'], 'string', 'max' => 8],
            [['EmpPhoto'], 'string', 'max' => 100],
            [['EmpStatus', 'UserStatus'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TableId' => 'Table ID',
            'EmpCode' => 'Emp Code',
            'EmpName' => 'Emp Name',
            'ShortName' => 'Short Name',
            'CompCode' => 'Comp Code',
            'EmpIcNo' => 'Emp Ic No',
            'Department' => 'Department',
            'Designation' => 'Designation',
            'EmpContactPerson' => 'Emp Contact Person',
            'PhoneNo1' => 'Phone No1',
            'MobileNo1' => 'Mobile No1',
            'MobileNo2' => 'Mobile No2',
            'FaxNo' => 'Fax No',
            'DOJ' => 'Doj',
            'DOB' => 'Dob',
            'DOL' => 'Dol',
            'EmailID' => 'Email ID',
            'DrivLicNo' => 'Driv Lic No',
            'DrivLicType' => 'Driv Lic Type',
            'DrivLicIssDate' => 'Driv Lic Iss Date',
            'DrivLicExpDate' => 'Driv Lic Exp Date',
            'Nationality' => 'Nationality',
            'EmpPhoto' => 'Emp Photo',
            'Address11' => 'Address11',
            'Address12' => 'Address12',
            'Address13' => 'Address13',
            'PostalCode1' => 'Postal Code1',
            'Address21' => 'Address21',
            'Address22' => 'Address22',
            'Address23' => 'Address23',
            'PostalCode2' => 'Postal Code2',
            'EmpStatus' => 'Emp Status',
            'CBy' => 'C By',
            'CDate' => 'C Date',
            'MBy' => 'M By',
            'MDate' => 'M Date',
            'UserStatus' => 'User Status',
            'DriverStatus' => 'Driver Status',
        ];
    }
}
