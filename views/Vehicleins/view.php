<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vechicleins */

$this->params['breadcrumbs'][] = ['label' => 'Vechicleins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vechicleins-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'vehicle_type',
            'vehicle_no',
            'vehicle_size',
            'Pm_windscreen_left',
            'Pm_wipers_left',
            'Pm_headlights_left',
            'Pm_highbeam_left',
            'Pm_windscreen_right',
            'Pm_wipers_right',
            'Pm_headlights_right',
            'Pm_highbeam_right',
            'signal_light_left',
            'signal_light_right',
            'Beacon',
            'Overall_body',
            'Pm_ft_whl_Inf_tyre_left',
            'Pm_ft_whl_Inf_tyre_right',
            'Pm_suspension_left',
            'Pm_suspension_right',
            'Pm_tyre_cond_left',
            'Pm_tyre_cond_right',
            'Pm_rim_nuts_left',
            'Pm_rim_nuts_right',
            'Pm_doors_left_right',
            'Pm_steering_wheel',
            'Pm_signal_lights_panel',
            'Pm_wipers',
            'Pm_speedo_meter',
            'Pm_tacho_meter',
            'Pm_odometer',
            'Pm_fuel_level',
            'Pm_sidemirror_left',
            'Pm_sidemirror_right',
            'Pm_various_foot_pedals',
            'Pm_Seatsandseetbelt',
            'Pm_aircorn',
            'Pm_road_tax',
            'Insp_disc',
            'Pm_TERP',
            'Pm_MSDS',
            'spil_kit',
            'Pm_fuel_tank',
            'Pm_fire_ext',
            'Pm_conn_vacuum',
            'Pm_conn_electrical',
            'Pm_Conn_brake',
            'Pm_rear_whl_inf_tyre_left',
            'Pm_rear_mudguards_left',
            'Pm_rear_suspensions_left',
            'Pm_rear_tyre_condition_left',
            'Pm_rear_whl_inf_tyre_right',
            'Pm_rear_mudguards_right',
            'Pm_rear_suspensions_right',
            'Pm_rear_tyre_condition_right',
            'Pm_rim_nuts',
            'Pm_num_plates_light',
            'Pm_break_lights',
            'Pm_reverse_lights',
            'Pm_signal_lights',
            'T_frame',
            'T-kingpin',
            'T_landing_Gear',
            'T_LG_GandL',
            'T_LG_shoes',
            'T_Bar',
            'U_Bolt',
            'Twist_lock_front',
            'Twist_lock_center',
            'Twist_lock_rear',
            'Bumper',
            'Reg_num_palte',
            'Under-ride guard',
            'Hazchem_Panel',
            'T_tyre_Inflation_of _Tyre',
            'T_tyre_mudguard',
            'T_tyre_axle1',
            'T_tyre_axle2',
            'T_tyre_axle3',
            'Rimandnuts',
            'Suspension',
            'Visible_condi_of_axles',
            'Lights_indicators',
            'Brake_lights',
            'Front _lights',
            'Indicators_tail',
            'Num_plates_lights_Tr_Pm',
            'Power_cable',
            'Power_connector_male',
            'Reverse_lights',
            'Reverse_buzzer',
            'Speed_limit_signage',
            'Red_reflector',
            'Yellow_side_reflector',
            'Tr_Brake_sys_connectors',
            'Tr_Brake_chamber',
            'Trb_air_tank',
            'Trb_relay_valve',
            'Tr_brake_hose',
            'Tr_parkingbrake_lever',
            'rating',
            'insp_type',
            'last_date_insp',
            'insp_period',
            'insp_duedate',
            'insp_flagdate',
            'insp_flagemail:email',
            'inspected_by',
            'C_by',
            'C_date',
            'M_by',
            'M_date',
        ],
    ]) ?>

</div>
