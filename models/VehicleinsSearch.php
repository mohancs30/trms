<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vehicleins;

/**
 * VehicleinsSearch represents the model behind the search form about `app\models\Vehicleins`.
 */
class VehicleinsSearch extends Vehicleins
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['vehicle_type', 'vehicle_no', 'vehicle_size', 'Pm_windscreen', 'Pm_wipers_left', 'Pm_headlights_left', 'Pm_highbeam_left', 'Pm_wipers_right', 'Pm_headlights_right', 'Pm_highbeam_right', 'signal_light_left', 'signal_light_right', 'Beacon', 'Overall_body', 'Pm_ft_whl_Inf_tyre_left', 'Pm_ft_whl_Inf_tyre_right', 'Pm_suspension_left', 'Pm_suspension_right', 'Pm_tyre_cond_left', 'Pm_tyre_cond_right', 'Pm_rim_nuts_left', 'Pm_rim_nuts_right', 'Pm_doors_left_right', 'Pm_steering_wheel', 'Pm_signal_lights_panel', 'Pm_wipers', 'Pm_speedo_meter', 'Pm_tacho_meter', 'Pm_odometer', 'Pm_fuel_level', 'Pm_sidemirror_left', 'Pm_sidemirror_right', 'Pm_various_foot_pedals', 'Pm_Seatsandseetbelt', 'Pm_aircorn', 'Pm_road_tax', 'Insp_disc', 'Pm_TERP', 'Pm_MSDS', 'spil_kit', 'Pm_fuel_tank', 'Pm_fire_ext', 'Pm_conn_vacuum', 'Pm_conn_electrical', 'Pm_Conn_brake', 'Pm_rear_whl_inf_tyre_left', 'Pm_rear_mudguards_left', 'Pm_rear_suspensions_left', 'Pm_rear_tyre_condition_left', 'Pm_rear_whl_inf_tyre_right', 'Pm_rear_mudguards_right', 'Pm_rear_suspensions_right', 'Pm_rear_tyre_condition_right', 'Pm_rim_nuts', 'Pm_num_plates_light', 'Pm_break_lights', 'Pm_reverse_lights', 'Pm_signal_lights', 'T_frame', 'T-kingpin', 'T_landing_Gear', 'T_LG_GandL', 'T_LG_shoes', 'T_Bar', 'U_Bolt', 'Twist_lock_front', 'Twist_lock_center', 'Twist_lock_rear', 'Bumper', 'Reg_num_palte', 'Under-ride guard', 'Hazchem_Panel', 'T_tyre_Inflation_of _Tyre', 'T_tyre_mudguard', 'T_tyre_axle1', 'T_tyre_axle2', 'T_tyre_axle3', 'Rimandnuts', 'Suspension', 'Visible_condi_of_axles', 'Lights_indicators', 'Brake_lights', 'Front _lights', 'Indicators_tail', 'Num_plates_lights_Tr_Pm', 'Power_cable', 'Power_connector_male', 'Reverse_lights', 'Reverse_buzzer', 'Speed_limit_signage', 'Red_reflector', 'Yellow_side_reflector', 'Tr_Brake_sys_connectors', 'Tr_Brake_chamber', 'Trb_air_tank', 'Trb_relay_valve', 'Tr_brake_hose', 'Tr_parkingbrake_lever', 'rating', 'insp_type', 'last_date_insp', 'insp_period', 'insp_duedate', 'insp_flagdate', 'insp_flagemail', 'inspected_by', 'C_by', 'C_date', 'M_by', 'M_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Vehicleins::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'last_date_insp' => $this->last_date_insp,
            'insp_duedate' => $this->insp_duedate,
            'insp_flagdate' => $this->insp_flagdate,
            'C_date' => $this->C_date,
            'M_date' => $this->M_date,
        ]);

        $query->andFilterWhere(['like', 'vehicle_type', $this->vehicle_type])
            ->andFilterWhere(['like', 'vehicle_no', $this->vehicle_no])
            ->andFilterWhere(['like', 'vehicle_size', $this->vehicle_size])
            ->andFilterWhere(['like', 'Pm_windscreen', $this->Pm_windscreen])
            ->andFilterWhere(['like', 'Pm_wipers_left', $this->Pm_wipers_left])
            ->andFilterWhere(['like', 'Pm_headlights_left', $this->Pm_headlights_left])
            ->andFilterWhere(['like', 'Pm_highbeam_left', $this->Pm_highbeam_left])
            ->andFilterWhere(['like', 'Pm_wipers_right', $this->Pm_wipers_right])
            ->andFilterWhere(['like', 'Pm_headlights_right', $this->Pm_headlights_right])
            ->andFilterWhere(['like', 'Pm_highbeam_right', $this->Pm_highbeam_right])
            ->andFilterWhere(['like', 'signal_light_left', $this->signal_light_left])
            ->andFilterWhere(['like', 'signal_light_right', $this->signal_light_right])
            ->andFilterWhere(['like', 'Beacon', $this->Beacon])
            ->andFilterWhere(['like', 'Overall_body', $this->Overall_body])
            ->andFilterWhere(['like', 'Pm_ft_whl_Inf_tyre_left', $this->Pm_ft_whl_Inf_tyre_left])
            ->andFilterWhere(['like', 'Pm_ft_whl_Inf_tyre_right', $this->Pm_ft_whl_Inf_tyre_right])
            ->andFilterWhere(['like', 'Pm_suspension_left', $this->Pm_suspension_left])
            ->andFilterWhere(['like', 'Pm_suspension_right', $this->Pm_suspension_right])
            ->andFilterWhere(['like', 'Pm_tyre_cond_left', $this->Pm_tyre_cond_left])
            ->andFilterWhere(['like', 'Pm_tyre_cond_right', $this->Pm_tyre_cond_right])
            ->andFilterWhere(['like', 'Pm_rim_nuts_left', $this->Pm_rim_nuts_left])
            ->andFilterWhere(['like', 'Pm_rim_nuts_right', $this->Pm_rim_nuts_right])
            ->andFilterWhere(['like', 'Pm_doors_left_right', $this->Pm_doors_left_right])
            ->andFilterWhere(['like', 'Pm_steering_wheel', $this->Pm_steering_wheel])
		    ->andFilterWhere(['like', 'Pm_signal_lights_panel', $this->Pm_signal_lights_panel])
            ->andFilterWhere(['like', 'Pm_wipers', $this->Pm_wipers])
            ->andFilterWhere(['like', 'Pm_speedo_meter', $this->Pm_speedo_meter])
            ->andFilterWhere(['like', 'Pm_tacho_meter', $this->Pm_tacho_meter])
            ->andFilterWhere(['like', 'Pm_odometer', $this->Pm_odometer])
            ->andFilterWhere(['like', 'Pm_fuel_level', $this->Pm_fuel_level])
            ->andFilterWhere(['like', 'Pm_sidemirror_left', $this->Pm_sidemirror_left])
            ->andFilterWhere(['like', 'Pm_sidemirror_right', $this->Pm_sidemirror_right])
            ->andFilterWhere(['like', 'Pm_various_foot_pedals', $this->Pm_various_foot_pedals])
            ->andFilterWhere(['like', 'Pm_Seatsandseetbelt', $this->Pm_Seatsandseetbelt])
            ->andFilterWhere(['like', 'Pm_aircorn', $this->Pm_aircorn])
            ->andFilterWhere(['like', 'Pm_road_tax', $this->Pm_road_tax])
            ->andFilterWhere(['like', 'Insp_disc', $this->Insp_disc])
            ->andFilterWhere(['like', 'Pm_TERP', $this->Pm_TERP])
            ->andFilterWhere(['like', 'Pm_MSDS', $this->Pm_MSDS])
            ->andFilterWhere(['like', 'spil_kit', $this->spil_kit])
            ->andFilterWhere(['like', 'Pm_fuel_tank', $this->Pm_fuel_tank])
            ->andFilterWhere(['like', 'Pm_fire_ext', $this->Pm_fire_ext])
            ->andFilterWhere(['like', 'Pm_conn_vacuum', $this->Pm_conn_vacuum])
            ->andFilterWhere(['like', 'Pm_conn_electrical', $this->Pm_conn_electrical])
            ->andFilterWhere(['like', 'Pm_Conn_brake', $this->Pm_Conn_brake])
            ->andFilterWhere(['like', 'Pm_rear_whl_inf_tyre_left', $this->Pm_rear_whl_inf_tyre_left])
            ->andFilterWhere(['like', 'Pm_rear_mudguards_left', $this->Pm_rear_mudguards_left])
            ->andFilterWhere(['like', 'Pm_rear_suspensions_left', $this->Pm_rear_suspensions_left])
            ->andFilterWhere(['like', 'Pm_rear_tyre_condition_left', $this->Pm_rear_tyre_condition_left])
            ->andFilterWhere(['like', 'Pm_rear_whl_inf_tyre_right', $this->Pm_rear_whl_inf_tyre_right])
            ->andFilterWhere(['like', 'Pm_rear_mudguards_right', $this->Pm_rear_mudguards_right])
            ->andFilterWhere(['like', 'Pm_rear_suspensions_right', $this->Pm_rear_suspensions_right])
            ->andFilterWhere(['like', 'Pm_rear_tyre_condition_right', $this->Pm_rear_tyre_condition_right])
            ->andFilterWhere(['like', 'Pm_rim_nuts', $this->Pm_rim_nuts])
            ->andFilterWhere(['like', 'Pm_num_plates_light', $this->Pm_num_plates_light])
            ->andFilterWhere(['like', 'Pm_break_lights', $this->Pm_break_lights])
            ->andFilterWhere(['like', 'Pm_reverse_lights', $this->Pm_reverse_lights])
            ->andFilterWhere(['like', 'Pm_signal_lights', $this->Pm_signal_lights])
            ->andFilterWhere(['like', 'T_frame', $this->T_frame])
            ->andFilterWhere(['like', 'T_kingpin',$this->T_kingpin])
            ->andFilterWhere(['like', 'T_landing_Gear', $this->T_landing_Gear])
            ->andFilterWhere(['like', 'T_LG_GandL', $this->T_LG_GandL])
            ->andFilterWhere(['like', 'T_LG_shoes', $this->T_LG_shoes])
            ->andFilterWhere(['like', 'T_Bar', $this->T_Bar])
            ->andFilterWhere(['like', 'U_Bolt', $this->U_Bolt])
            ->andFilterWhere(['like', 'Twist_lock_front', $this->Twist_lock_front])
            ->andFilterWhere(['like', 'Twist_lock_center', $this->Twist_lock_center])
            ->andFilterWhere(['like', 'Twist_lock_rear', $this->Twist_lock_rear])
            ->andFilterWhere(['like', 'Bumper', $this->Bumper])
            ->andFilterWhere(['like', 'Reg_num_palte', $this->Reg_num_palte])
            ->andFilterWhere(['like', 'Under-ride_guard', $this->Under_ride_guard])
            ->andFilterWhere(['like', 'Hazchem_Panel',$this->Hazchem_Panel])
            ->andFilterWhere(['like', 'T_tyre_mudguard', $this->T_tyre_mudguard])
            ->andFilterWhere(['like', 'T_tyre_axle1', $this->T_tyre_axle1])
            ->andFilterWhere(['like', 'T_tyre_axle2', $this->T_tyre_axle2])
            ->andFilterWhere(['like', 'T_tyre_axle3', $this->T_tyre_axle3])
            ->andFilterWhere(['like', 'Rimandnuts', $this->Rimandnuts])
            ->andFilterWhere(['like', 'Suspension', $this->Suspension])
            ->andFilterWhere(['like', 'Visible_condi_of_axles', $this->Visible_condi_of_axles])
            ->andFilterWhere(['like', 'Lights_indicators', $this->Lights_indicators])
            ->andFilterWhere(['like', 'Brake_lights', $this->Brake_lights])
             ->andFilterWhere(['like', 'Indicators_tail', $this->Indicators_tail])
            ->andFilterWhere(['like', 'Num_plates_lights_Tr_Pm', $this->Num_plates_lights_Tr_Pm])
            ->andFilterWhere(['like', 'Power_cable', $this->Power_cable])
            ->andFilterWhere(['like', 'Power_connector_male', $this->Power_connector_male])
            ->andFilterWhere(['like', 'Reverse_lights', $this->Reverse_lights])
            ->andFilterWhere(['like', 'Reverse_buzzer', $this->Reverse_buzzer])
            ->andFilterWhere(['like', 'Speed_limit_signage', $this->Speed_limit_signage])
            ->andFilterWhere(['like', 'Red_reflector', $this->Red_reflector])
            ->andFilterWhere(['like', 'Yellow_side_reflector', $this->Yellow_side_reflector])
            ->andFilterWhere(['like', 'Tr_Brake_sys_connectors', $this->Tr_Brake_sys_connectors])
            ->andFilterWhere(['like', 'Tr_Brake_chamber', $this->Tr_Brake_chamber])
            ->andFilterWhere(['like', 'Trb_air_tank', $this->Trb_air_tank])
            ->andFilterWhere(['like', 'Trb_relay_valve', $this->Trb_relay_valve])
            ->andFilterWhere(['like', 'Tr_brake_hose', $this->Tr_brake_hose])
            ->andFilterWhere(['like', 'Tr_parkingbrake_lever', $this->Tr_parkingbrake_lever])
            ->andFilterWhere(['like', 'rating', $this->rating])
            ->andFilterWhere(['like', 'insp_type', $this->insp_type])
            ->andFilterWhere(['like', 'insp_period', $this->insp_period])
            ->andFilterWhere(['like', 'insp_flagemail', $this->insp_flagemail])
            ->andFilterWhere(['like', 'inspected_by', $this->inspected_by])
            ->andFilterWhere(['like', 'C_by', $this->C_by])
            ->andFilterWhere(['like', 'M_by', $this->M_by]);

        return $dataProvider;
    }
}
