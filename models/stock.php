<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property integer $id
 * @property string $Type
 * @property string $Date
 * @property string $Item_code
 * @property integer $Unit_cost
 * @property integer $Qty
 * @property string $PO_ref
 * @property string $Brand
 * @property string $Descr
 * @property string $Supplier
 * @property integer $Cost
 * @property string $C_by
 * @property string $C_date
 * @property string $M_by
 * @property string $M_date
 * @property string $status
 * @property string $remark
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Type', 'Date', 'Item_code', 'Unit_cost', 'Qty', 'PO_ref', 'Brand', 'Descr', 'Supplier', 'Cost', 'C_by', 'C_date', 'M_by', 'M_date', 'status', 'remark'], 'required'],
            [['Date', 'C_date', 'M_date'], 'safe'],
            [['Unit_cost', 'Qty', 'Cost'], 'integer'],
            [['status'], 'string'],
            [['Type', 'Item_code', 'PO_ref', 'Brand', 'Descr', 'Supplier', 'C_by', 'M_by', 'remark'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Type' => 'Type',
            'Date' => 'Date',
            'Item_code' => 'Item Code',
            'Unit_cost' => 'Unit Cost',
            'Qty' => 'Qty',
            'PO_ref' => 'Po Ref',
            'Brand' => 'Brand',
            'Descr' => 'Descr',
            'Supplier' => 'Supplier',
            'Cost' => 'Cost',
            'C_by' => 'C By',
            'C_date' => 'C Date',
            'M_by' => 'M By',
            'M_date' => 'M Date',
            'status' => 'Status',
            'remark' => 'Remark',
        ];
    }
}
