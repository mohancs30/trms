<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mstcustomer".
 *
 * @property integer $id
 * @property string $customer_id
 * @property string $customer_name
 * @property string $c_address1
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
class Mstcustomer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mstcustomer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'customer_name', 'c_address1', 'c_address2', 'c_address3', 'c_contactno', 'c_email', 'status', 'remark', 'C_By', 'C_Date', 'M_By', 'M_Date'], 'required'],
            [['id'], 'integer'],
            [['status'], 'string'],
            [['C_Date', 'M_Date'], 'safe'],
            [['customer_id', 'customer_name', 'c_contactno', 'C_By', 'M_By'], 'string', 'max' => 20],
            [['c_address1', 'c_address2', 'c_address3', 'c_email', 'remark'], 'string', 'max' => 50],
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
            'customer_name' => 'Customer Name',
            'c_address1' => 'C Address1',
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
