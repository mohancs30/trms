<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vechicleins".
 *
 * @property integer $id
 * @property string $vehicle_type
 * @property string $vehicle_no
 * @property string $vehicle_size
 * @property string $Pm_windscreen_left
 * @property string $Pm_wipers_left
 * @property string $Pm_headlights_left
 * @property string $Pm_highbeam_left
 * @property string $Pm_windscreen_right
 * @property string $Pm_wipers_right
 * @property string $Pm_headlights_right
 * @property string $Pm_highbeam_right
 * @property string $signal_light_left
 * @property string $signal_light_right
 * @property string $Beacon
 * @property string $Overall_body
 * @property string $Pm_ft_whl_Inf_tyre_left
 * @property string $Pm_ft_whl_Inf_tyre_right
 * @property string $Pm_suspension_left
 * @property string $Pm_suspension_right
 * @property string $Pm_tyre_cond_left
 * @property string $Pm_tyre_cond_right
 * @property string $Pm_rim_nuts_left
 * @property string $Pm_rim_nuts_right
 * @property string $Pm_doors_left_right
 * @property string $Pm_steering_wheel
 * @property string $Pm_signal_lights_panel
 * @property string $Pm_wipers
 * @property string $Pm_speedo_meter
 * @property string $Pm_tacho_meter
 * @property string $Pm_odometer
 * @property string $Pm_fuel_level
 * @property string $Pm_sidemirror_left
 * @property string $Pm_sidemirror_right
 * @property string $Pm_various_foot_pedals
 * @property string $Pm_Seatsandseetbelt
 * @property string $Pm_aircorn
 * @property string $Pm_road_tax
 * @property string $Insp_disc
 * @property string $Pm_TERP
 * @property string $Pm_MSDS
 * @property string $spil_kit
 * @property string $Pm_fuel_tank
 * @property string $Pm_fire_ext
 * @property string $Pm_conn_vacuum
 * @property string $Pm_conn_electrical
 * @property string $Pm_Conn_brake
 * @property string $Pm_rear_whl_inf_tyre_left
 * @property string $Pm_rear_mudguards_left
 * @property string $Pm_rear_suspensions_left
 * @property string $Pm_rear_tyre_condition_left
 * @property string $Pm_rear_whl_inf_tyre_right
 * @property string $Pm_rear_mudguards_right
 * @property string $Pm_rear_suspensions_right
 * @property string $Pm_rear_tyre_condition_right
 * @property string $Pm_rim_nuts
 * @property string $Pm_num_plates_light
 * @property string $Pm_break_lights
 * @property string $Pm_reverse_lights
 * @property string $Pm_signal_lights
 * @property string $T_frame
 * @property string $T-kingpin
 * @property string $T_landing_Gear
 * @property string $T_LG_GandL
 * @property string $T_LG_shoes
 * @property string $T_Bar
 * @property string $U_Bolt
 * @property string $Twist_lock_front
 * @property string $Twist_lock_center
 * @property string $Twist_lock_rear
 * @property string $Bumper
 * @property string $Reg_num_palte
 * @property string $Under-ride guard
 * @property string $Hazchem_Panel
 * @property string $T_tyre_Inflation_of _Tyre
 * @property string $T_tyre_mudguard
 * @property string $T_tyre_axle1
 * @property string $T_tyre_axle2
 * @property string $T_tyre_axle3
 * @property string $Rimandnuts
 * @property string $Suspension
 * @property string $Visible_condi_of_axles
 * @property string $Lights_indicators
 * @property string $Brake_lights
 * @property string $Front _lights
 * @property string $Indicators_tail
 * @property string $Num_plates_lights_Tr_Pm
 * @property string $Power_cable
 * @property string $Power_connector_male
 * @property string $Reverse_lights
 * @property string $Reverse_buzzer
 * @property string $Speed_limit_signage
 * @property string $Red_reflector
 * @property string $Yellow_side_reflector
 * @property string $Tr_Brake_sys_connectors
 * @property string $Tr_Brake_chamber
 * @property string $Trb_air_tank
 * @property string $Trb_relay_valve
 * @property string $Tr_brake_hose
 * @property string $Tr_parkingbrake_lever
 * @property string $rating
 * @property string $insp_type
 * @property string $last_date_insp
 * @property string $insp_period
 * @property string $insp_duedate
 * @property string $insp_flagdate
 * @property string $insp_flagemail
 * @property string $inspected_by
 * @property string $C_by
 * @property string $C_date
 * @property string $M_by
 * @property string $M_date
 */
class Vehicleins extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicleins';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vehicle_type', 'vehicle_no'], 'required'],
            [['id'], 'integer'],
            [['last_date_insp', 'insp_duedate', 'insp_flagdate', 'C_date', 'M_date'], 'safe'],
            [['vehicle_type', 'vehicle_no', 'insp_type', 'insp_period', 'inspected_by', 'C_by', 'M_by'], 'string', 'max' => 20],
            [['vehicle_size'], 'string', 'max' => 10],
            [['rating'], 'string', 'max' => 30],
            [['insp_flagemail'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicle_type' => 'Vehicle Type',
            'vehicle_no' => 'Vehicle No',
            'vehicle_size' => 'Vehicle Size',
            'Pm_windscreen' => 'Pm Windscreen',
            'Pm_wipers_left' => 'Pm Wipers Left',
            'Pm_headlights_left' => 'Pm Headlights Left',
            'Pm_highbeam_left' => 'Pm Highbeam Left',
            'Pm_wipers_right' => 'Pm Wipers Right',
            'Pm_headlights_right' => 'Pm Headlights Right',
            'Pm_highbeam_right' => 'Pm Highbeam Right',
            'signal_light_left' => 'Signal Light Left',
            'signal_light_right' => 'Signal Light Right',
            'Beacon' => 'Beacon',
            'Overall_body' => 'Overall Body',
            'Pm_ft_whl_Inf_tyre_left' => 'Pm Ft Whl Inf Tyre Left',
            'Pm_ft_whl_Inf_tyre_right' => 'Pm Ft Whl Inf Tyre Right',
            'Pm_suspension_left' => 'Pm Suspension Left',
            'Pm_suspension_right' => 'Pm Suspension Right',
            'Pm_tyre_cond_left' => 'Pm Tyre Cond Left',
            'Pm_tyre_cond_right' => 'Pm Tyre Cond Right',
            'Pm_rim_nuts_left' => 'Pm Rim Nuts Left',
            'Pm_rim_nuts_right' => 'Pm Rim Nuts Right',
            'Pm_doors_left_right' => 'Pm Doors Left Right',
            'Pm_steering_wheel' => 'Pm Steering Wheel',
            'Pm_signal_lights_panel' => 'Pm Signal Lights Panel',
            'Pm_wipers' => 'Pm Wipers',
            'Pm_speedo_meter' => 'Pm Speedo Meter',
            'Pm_tacho_meter' => 'Pm Tacho Meter',
            'Pm_odometer' => 'Pm Odometer',
            'Pm_fuel_level' => 'Pm Fuel Level',
            'Pm_sidemirror_left' => 'Pm Sidemirror Left',
            'Pm_sidemirror_right' => 'Pm Sidemirror Right',
            'Pm_various_foot_pedals' => 'Pm Various Foot Pedals',
            'Pm_Seatsandseetbelt' => 'Pm Seatsandseetbelt',
            'Pm_aircorn' => 'Pm Aircorn',
            'Pm_road_tax' => 'Pm Road Tax',
            'Insp_disc' => 'Insp Disc',
            'Pm_TERP' => 'Pm Terp',
            'Pm_MSDS' => 'Pm Msds',
            'spil_kit' => 'Spil Kit',
            'Pm_fuel_tank' => 'Pm Fuel Tank',
            'Pm_fire_ext' => 'Pm Fire Ext',
            'Pm_conn_vacuum' => 'Pm Conn Vacuum',
            'Pm_conn_electrical' => 'Pm Conn Electrical',
            'Pm_Conn_brake' => 'Pm Conn Brake',
            'Pm_rear_whl_inf_tyre_left' => 'Pm Rear Whl Inf Tyre Left',
            'Pm_rear_mudguards_left' => 'Pm Rear Mudguards Left',
            'Pm_rear_suspensions_left' => 'Pm Rear Suspensions Left',
            'Pm_rear_tyre_condition_left' => 'Pm Rear Tyre Condition Left',
            'Pm_rear_whl_inf_tyre_right' => 'Pm Rear Whl Inf Tyre Right',
            'Pm_rear_mudguards_right' => 'Pm Rear Mudguards Right',
            'Pm_rear_suspensions_right' => 'Pm Rear Suspensions Right',
            'Pm_rear_tyre_condition_right' => 'Pm Rear Tyre Condition Right',
            'Pm_rim_nuts' => 'Pm Rim Nuts',
            'Pm_num_plates_light' => 'Pm Num Plates Light',
            'Pm_break_lights' => 'Pm Break Lights',
            'Pm_reverse_lights' => 'Pm Reverse Lights',
            'Pm_signal_lights' => 'Pm Signal Lights',
            'T_frame' => 'Main frame or skeleton',
            'T-kingpin' => 'T Kingpin',
            'T_landing_Gear' => 'T Landing Gear',
            'T_LG_GandL' => 'T Lg Gand L',
            'T_LG_shoes' => 'T Lg Shoes',
            'T_Bar' => 'T Bar',
            'U_Bolt' => 'U Bolt',
            'Twist_lock_front' => 'Twist Lock Front',
            'Twist_lock_center' => 'Twist Lock Center',
            'Twist_lock_rear' => 'Twist Lock Rear',
            'Bumper' => 'Bumper',
            'Reg_num_palte' => 'Reg Num Palte',
            'Under-ride guard' => 'Under Ride Guard',
            'Hazchem_Panel' => 'Hazchem Panel',
            'T_tyre_Inflation_of_Tyre' => 'T Tyre Inflation Of Tyre',
            'T_tyre_mudguard' => 'T Tyre Mudguard',
            'T_tyre_axle1' => 'T Tyre Axle1',
            'T_tyre_axle2' => 'T Tyre Axle2',
            'T_tyre_axle3' => 'T Tyre Axle3',
            'Rimandnuts' => 'Rimandnuts',
            'Suspension' => 'Suspension',
            'Visible_condi_of_axles' => 'Visible Condi Of Axles',
            'Lights_indicators' => 'Lights Indicators',
            'Brake_lights' => 'Brake Lights',
            'Front _lights' => 'Front Lights',
            'Indicators_tail' => 'Indicators Tail',
            'Num_plates_lights_Tr_Pm' => 'Num Plates Lights Tr Pm',
            'Power_cable' => 'Power Cable',
            'Power_connector_male' => 'Power Connector Male',
            'Reverse_lights' => 'Reverse Lights',
            'Reverse_buzzer' => 'Reverse Buzzer',
            'Speed_limit_signage' => 'Speed Limit Signage',
            'Red_reflector' => 'Red Reflector',
            'Yellow_side_reflector' => 'Yellow Side Reflector',
            'Tr_Brake_sys_connectors' => 'Tr Brake Sys Connectors',
            'Tr_Brake_chamber' => 'Tr Brake Chamber',
            'Trb_air_tank' => 'Trb Air Tank',
            'Trb_relay_valve' => 'Trb Relay Valve',
            'Tr_brake_hose' => 'Tr Brake Hose',
            'Tr_parkingbrake_lever' => 'Tr Parkingbrake Lever',
            'rating' => 'Rating',
            'insp_type' => 'Insp Type',
            'last_date_insp' => 'Last Date Insp',
            'insp_period' => 'Insp Period',
            'insp_duedate' => 'Insp Duedate',
            'insp_flagdate' => 'Insp Flagdate',
            'insp_flagemail' => 'Insp Flagemail',
            'inspected_by' => 'Inspected By',
            'C_by' => 'C By',
            'C_date' => 'C Date',
            'M_by' => 'M By',
            'M_date' => 'M Date',
        ];
    }
}
