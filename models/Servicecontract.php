<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicecontract".
 *
 * @property integer $id
 * @property string $customer_id
 * @property string $contract_ref_no
 * @property string $company_name
 * @property string $workshop_address1
 * @property string $c_address2
 * @property string $c_address3
 * @property string $c_contactno
 * @property string $c_email
 * @property string $status
 * @property string $remark
 * @property string $C_By
 * @property string $C_Date
 * @property string $M_By
 * @property string $M_Date
 */
class Servicecontract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicecontract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'company_name', 'workshop_address1', 'c_address2', 'c_address3', 'c_contactno', 'c_email', 'status', 'remark', 'C_By', 'C_Date', 'M_By', 'M_Date'], 'required'],
            [['id'], 'integer'],
            [['status'], 'string'],
            [['C_Date', 'M_Date'], 'safe'],
            [['customer_id', 'company_name', 'c_contactno', 'C_By', 'M_By'], 'string', 'max' => 20],
            [['contract_ref_no', 'workshop_address1', 'c_address2', 'c_address3', 'c_email', 'remark'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'contract_ref_no' => 'Contract Ref No',
            'company_name' => 'Company Name',
            'workshop_address1' => 'Workshop Address1',
            'c_address2' => 'C Address2',
            'c_address3' => 'C Address3',
            'c_contactno' => 'C Contactno',
            'c_email' => 'C Email',
            'status' => 'Status',
            'remark' => 'Remark',
            'C_By' => 'C By',
            'C_Date' => 'C Date',
            'M_By' => 'M By',
            'M_Date' => 'M Date',
        ];
    }
}
