<?php

namespace app\models;
use kartik\password\StrengthValidator;
//use karpoff\icrop\CropImageUploadBehavior;

use Yii;

/**
 * This is the model class for table "mstuser".
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $username
 * @property string $password
 * @property string $EmailID
 * @property string $PhoneNo
 * @property string $Designation
 * @property resource $UserImg
 * @property string $status
 * @property string crop_field
 * @property string cropped_field
 * @property string $RegisterIP
 * @property string $cBy
 * @property string $cDate
 * @property string $mBy
 * @property string $mDate
 */
class Mstuser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'mstuser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EmpId','username', 'password'], 'required','message'=>''],
            [['UserImg'], 'string'],
            [['cDate', 'mDate','EmpId'], 'safe'],
            [['firstName'], 'string', 'max' => 15],
            [['lastName', 'RegisterIP'], 'string', 'max' => 20],
            [['username', 'password', 'PhoneNo', 'cBy', 'mBy'], 'string', 'max' => 30],
            [['EmailID'], 'string', 'max' => 50],
            [['UserImg'], 'string', 'max' => 200],
            [['Designation'], 'string', 'max' => 35],
            [['status'], 'string', 'max' => 10],
            [['username'], 'unique'],
            [['file'],'file'],
            ['EmailID', 'email','message'=>''],
            [['password'], StrengthValidator::className(), 'preset'=>'normal', 'userAttribute'=>'username'],
            //['UserImg', 'file', 'extensions' => ['png'], 'maxSize' => 1024 * 1024 * 2],
            //['UserImg', 'image', 'minWidth' => 50, 'maxWidth' => 50,'minHeight' => 50, 'maxHeight' => 50, 'extensions' => 'png', 'maxSize' => 1024 * 1024 * 2],
            //['UserImg', 'file', 'extensions' => 'png', 'on' => ['insert', 'update']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'FirstName',
            'lastName' => 'LastName',
            'username' => 'Username',
            'password' => 'Password',
            'EmailID' => 'EmailID',
            'PhoneNo' => 'PhoneNo',
            'Designation' => 'Designation',
            'UserImg' => 'UserImg',
            'status' => 'Status',
            'RegisterIP' => 'RegisterIp',
            'cBy' => 'C By',
            'cDate' => 'C Date',
            'mBy' => 'M By',
            'mDate' => 'M Date',
            'file' => 'photo',
            
        ];
    }
    
       /* function behaviors()
          {
          return [
            [
                'class' => CropImageUploadBehavior::className(),
                'attribute' => 'UserImg',
                'scenarios' => ['insert', 'update'],
                'path' => '@webroot/upload/docs',
                'url' => '@web/upload/docs',
                'ratio' => 1,
                //'crop_field' => 'photo_crop',
                //'cropped_field' => 'photo_cropped',
                ],
           ];
         } */
    
     public function getAuthKey()
      {
        throw new \yii\base\NotSupportedException();
        //return $this->authKey;
      }
    public function getId()
      {
        return $this->id;
      }
    public function validateAuthKey($authKey)
      {
        throw new \yii\base\NotSupportedException();
        //return $this->authKey === $authKey;
      }
    public static function findIdentity($id)
      {
        return self::findOne($id);
      }
    public static function findIdentityByAccessToken($token, $type = null)
      {
        throw new \yii\base\NotSupportedException();
        //return static::findOne(['access_token' => $token]);
      }
    public static function findByUsername($username)
      {
          return self::findOne(['username'=>$username]);
		 
      }
    public function validatePassword($password){
		
		return $this->password === $password;
		
      }
    public function getEmployee(){
          return $this->hasOne(Mstemployee::className(),['EmpCode'=>'EmpId']);
      }
    public function getCompCode(){
          return $this->employee ? $this->employee->CompCode : "";
      }
}
