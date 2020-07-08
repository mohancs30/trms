<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VechicleinsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vechicleins-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'vehicle_type') ?>

    <?= $form->field($model, 'vehicle_no') ?>

    <?= $form->field($model, 'vehicle_size') ?>

    <?= $form->field($model, 'Pm_windscreen_left') ?>

    <?php // echo $form->field($model, 'Pm_wipers_left') ?>

    <?php // echo $form->field($model, 'Pm_headlights_left') ?>

    <?php // echo $form->field($model, 'Pm_highbeam_left') ?>

    <?php // echo $form->field($model, 'Pm_windscreen_right') ?>

    <?php // echo $form->field($model, 'Pm_wipers_right') ?>

    <?php // echo $form->field($model, 'Pm_headlights_right') ?>

    <?php // echo $form->field($model, 'Pm_highbeam_right') ?>

    <?php // echo $form->field($model, 'signal_light_left') ?>

    <?php // echo $form->field($model, 'signal_light_right') ?>

    <?php // echo $form->field($model, 'Beacon') ?>

    <?php // echo $form->field($model, 'Overall_body') ?>

    <?php // echo $form->field($model, 'Pm_ft_whl_Inf_tyre_left') ?>

    <?php // echo $form->field($model, 'Pm_ft_whl_Inf_tyre_right') ?>

    <?php // echo $form->field($model, 'Pm_suspension_left') ?>

    <?php // echo $form->field($model, 'Pm_suspension_right') ?>

    <?php // echo $form->field($model, 'Pm_tyre_cond_left') ?>

    <?php // echo $form->field($model, 'Pm_tyre_cond_right') ?>

    <?php // echo $form->field($model, 'Pm_rim_nuts_left') ?>

    <?php // echo $form->field($model, 'Pm_rim_nuts_right') ?>

    <?php // echo $form->field($model, 'Pm_doors_left_right') ?>

    <?php // echo $form->field($model, 'Pm_steering_wheel') ?>

    <?php // echo $form->field($model, 'Pm_signal_lights_panel') ?>

    <?php // echo $form->field($model, 'Pm_wipers') ?>

    <?php // echo $form->field($model, 'Pm_speedo_meter') ?>

    <?php // echo $form->field($model, 'Pm_tacho_meter') ?>

    <?php // echo $form->field($model, 'Pm_odometer') ?>

    <?php // echo $form->field($model, 'Pm_fuel_level') ?>

    <?php // echo $form->field($model, 'Pm_sidemirror_left') ?>

    <?php // echo $form->field($model, 'Pm_sidemirror_right') ?>

    <?php // echo $form->field($model, 'Pm_various_foot_pedals') ?>

    <?php // echo $form->field($model, 'Pm_Seatsandseetbelt') ?>

    <?php // echo $form->field($model, 'Pm_aircorn') ?>

    <?php // echo $form->field($model, 'Pm_road_tax') ?>

    <?php // echo $form->field($model, 'Insp_disc') ?>

    <?php // echo $form->field($model, 'Pm_TERP') ?>

    <?php // echo $form->field($model, 'Pm_MSDS') ?>

    <?php // echo $form->field($model, 'spil_kit') ?>

    <?php // echo $form->field($model, 'Pm_fuel_tank') ?>

    <?php // echo $form->field($model, 'Pm_fire_ext') ?>

    <?php // echo $form->field($model, 'Pm_conn_vacuum') ?>

    <?php // echo $form->field($model, 'Pm_conn_electrical') ?>

    <?php // echo $form->field($model, 'Pm_Conn_brake') ?>

    <?php // echo $form->field($model, 'Pm_rear_whl_inf_tyre_left') ?>

    <?php // echo $form->field($model, 'Pm_rear_mudguards_left') ?>

    <?php // echo $form->field($model, 'Pm_rear_suspensions_left') ?>

    <?php // echo $form->field($model, 'Pm_rear_tyre_condition_left') ?>

    <?php // echo $form->field($model, 'Pm_rear_whl_inf_tyre_right') ?>

    <?php // echo $form->field($model, 'Pm_rear_mudguards_right') ?>

    <?php // echo $form->field($model, 'Pm_rear_suspensions_right') ?>

    <?php // echo $form->field($model, 'Pm_rear_tyre_condition_right') ?>

    <?php // echo $form->field($model, 'Pm_rim_nuts') ?>

    <?php // echo $form->field($model, 'Pm_num_plates_light') ?>

    <?php // echo $form->field($model, 'Pm_break_lights') ?>

    <?php // echo $form->field($model, 'Pm_reverse_lights') ?>

    <?php // echo $form->field($model, 'Pm_signal_lights') ?>

    <?php // echo $form->field($model, 'T_frame') ?>

    <?php // echo $form->field($model, 'T-kingpin') ?>

    <?php // echo $form->field($model, 'T_landing_Gear') ?>

    <?php // echo $form->field($model, 'T_LG_GandL') ?>

    <?php // echo $form->field($model, 'T_LG_shoes') ?>

    <?php // echo $form->field($model, 'T_Bar') ?>

    <?php // echo $form->field($model, 'U_Bolt') ?>

    <?php // echo $form->field($model, 'Twist_lock_front') ?>

    <?php // echo $form->field($model, 'Twist_lock_center') ?>

    <?php // echo $form->field($model, 'Twist_lock_rear') ?>

    <?php // echo $form->field($model, 'Bumper') ?>

    <?php // echo $form->field($model, 'Reg_num_palte') ?>

    <?php // echo $form->field($model, 'Under-ride guard') ?>

    <?php // echo $form->field($model, 'Hazchem_Panel') ?>

    <?php // echo $form->field($model, 'T_tyre_Inflation_of _Tyre') ?>

    <?php // echo $form->field($model, 'T_tyre_mudguard') ?>

    <?php // echo $form->field($model, 'T_tyre_axle1') ?>

    <?php // echo $form->field($model, 'T_tyre_axle2') ?>

    <?php // echo $form->field($model, 'T_tyre_axle3') ?>

    <?php // echo $form->field($model, 'Rimandnuts') ?>

    <?php // echo $form->field($model, 'Suspension') ?>

    <?php // echo $form->field($model, 'Visible_condi_of_axles') ?>

    <?php // echo $form->field($model, 'Lights_indicators') ?>

    <?php // echo $form->field($model, 'Brake_lights') ?>

    <?php // echo $form->field($model, 'Front _lights') ?>

    <?php // echo $form->field($model, 'Indicators_tail') ?>

    <?php // echo $form->field($model, 'Num_plates_lights_Tr_Pm') ?>

    <?php // echo $form->field($model, 'Power_cable') ?>

    <?php // echo $form->field($model, 'Power_connector_male') ?>

    <?php // echo $form->field($model, 'Reverse_lights') ?>

    <?php // echo $form->field($model, 'Reverse_buzzer') ?>

    <?php // echo $form->field($model, 'Speed_limit_signage') ?>

    <?php // echo $form->field($model, 'Red_reflector') ?>

    <?php // echo $form->field($model, 'Yellow_side_reflector') ?>

    <?php // echo $form->field($model, 'Tr_Brake_sys_connectors') ?>

    <?php // echo $form->field($model, 'Tr_Brake_chamber') ?>

    <?php // echo $form->field($model, 'Trb_air_tank') ?>

    <?php // echo $form->field($model, 'Trb_relay_valve') ?>

    <?php // echo $form->field($model, 'Tr_brake_hose') ?>

    <?php // echo $form->field($model, 'Tr_parkingbrake_lever') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'insp_type') ?>

    <?php // echo $form->field($model, 'last_date_insp') ?>

    <?php // echo $form->field($model, 'insp_period') ?>

    <?php // echo $form->field($model, 'insp_duedate') ?>

    <?php // echo $form->field($model, 'insp_flagdate') ?>

    <?php // echo $form->field($model, 'insp_flagemail') ?>

    <?php // echo $form->field($model, 'inspected_by') ?>

    <?php // echo $form->field($model, 'C_by') ?>

    <?php // echo $form->field($model, 'C_date') ?>

    <?php // echo $form->field($model, 'M_by') ?>

    <?php // echo $form->field($model, 'M_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
