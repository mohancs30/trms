<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fuel".
 *
 * @property integer $id
 * @property string $vehicleregno
 * @property string $vehicletype
 * @property string $vehicle_desc
 * @property string $fuel_date
 * @property string $fuel_station
 * @property string $mtr_read
 * @property string $ltr_pump
 * @property integer $ltr_price
 * @property string $fill_type
 * @property string $last_milage
 * @property string $driver
 * @property string $c_by
 * @property string $c_date
 * @property string $m_by
 * @property string $m_date
 * @property string $status
 * @property string $remark
 */
class Fuel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fuel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fuel_date', 'c_date', 'm_date'], 'safe'],
            [['ltr_price'], 'integer'],
            [['status'], 'string'],
            [['vehicleregno', 'vehicletype', 'vehicle_desc', 'fuel_station', 'mtr_read', 'ltr_pump', 'fill_type', 'last_milage', 'driver', 'c_by', 'm_by', 'remark'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicleregno' => 'Vehicleregno',
            'vehicletype' => 'Vehicletype',
            'vehicle_desc' => 'Vehicle Desc',
            'fuel_date' => 'Fuel Date',
            'fuel_station' => 'Fuel Station',
            'mtr_read' => 'Mtr Read',
            'ltr_pump' => 'Ltr Pump',
            'ltr_price' => 'Ltr Price',
            'fill_type' => 'Fill Type',
            'last_milage' => 'Last Milage',
            'driver' => 'Driver',
            'c_by' => 'C By',
            'c_date' => 'C Date',
            'm_by' => 'M By',
            'm_date' => 'M Date',
            'status' => 'Status',
            'remark' => 'Remark',
        ];
    }
}
