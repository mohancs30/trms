<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $B_id
 * @property string $Movetype
 * @property int $Qty
 * @property string $Arrivaltime
 * @property string $status
 * @property string $Remarks
 * @property string $C_date
 * @property string $C_By
 * @property string $M_date
 * @property string $M_By
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['B_id'], 'integer'],
            [['status'], 'string'],
            [['C_date', 'M_date'], 'safe'],
            [['Movetype', 'C_By', 'M_By'], 'string', 'max' => 20],
            [['Arrivaltime', 'Remarks'], 'string', 'max' => 50],
            [['B_id'], 'unique'],
			
        ];
    }

   
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'B_id' => 'B ID',
			'VehicleRegNo'=>'Vehicle No',
            'Movetype' => 'Move',
			'Size'=>'Size',
			'bookingref_no'=>'Booking Ref No',
            'Qty' => 'Qty',
			'Arrivaltime' => 'Arrivaltime',
			'Fromdate'=>'From date',
			'Todate'=>'To date',
            'status' => 'Status',
            'Remarks' => 'Remarks',
            'C_date' => 'Created Date',
            'C_By' => 'Created By',
            'M_date' => 'M Date',
            'M_By' => 'M By',
        ];
    }
}
