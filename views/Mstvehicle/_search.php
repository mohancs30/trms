<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MstvehicleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mstvehicle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TableId') ?>

    <?= $form->field($model, 'CompCode') ?>

    <?= $form->field($model, 'VehicleRegNo') ?>

    <?= $form->field($model, 'VehicleDesc') ?>

    <?= $form->field($model, 'VehicleName') ?>

    <?php // echo $form->field($model, 'VehicleType') ?>

    <?php // echo $form->field($model, 'VehicleJobType') ?>

    <?php // echo $form->field($model, 'Size') ?>

    <?php // echo $form->field($model, 'VehicleEngNo') ?>

    <?php // echo $form->field($model, 'BrandName') ?>

    <?php // echo $form->field($model, 'YearOfMFG') ?>

    <?php // echo $form->field($model, 'MakeModel') ?>

    <?php // echo $form->field($model, 'ChassisNo') ?>

    <?php // echo $form->field($model, 'LadenWight') ?>

    <?php // echo $form->field($model, 'UnLadenWight') ?>

    <?php // echo $form->field($model, 'RegDate') ?>

    <?php // echo $form->field($model, 'EffDateOwner') ?>

    <?php // echo $form->field($model, 'COEExpiry') ?>

    <?php // echo $form->field($model, 'RoadTaxFrom') ?>

    <?php // echo $form->field($model, 'RoadTaxTo') ?>

    <?php // echo $form->field($model, 'RoadTaxDue') ?>

    <?php // echo $form->field($model, 'InsurFrom') ?>

    <?php // echo $form->field($model, 'InsurTo') ?>

    <?php // echo $form->field($model, 'InsurDue') ?>

    <?php // echo $form->field($model, 'CurrentLocation') ?>

    <?php // echo $form->field($model, 'PermitFrom') ?>

    <?php // echo $form->field($model, 'PermitTo') ?>

    <?php // echo $form->field($model, 'VPCFrom') ?>

    <?php // echo $form->field($model, 'VPCTo') ?>

    <?php // echo $form->field($model, 'ROBDate') ?>

    <?php // echo $form->field($model, 'LoadingCapacity') ?>

    <?php // echo $form->field($model, 'VehicleCondition') ?>

    <?php // echo $form->field($model, 'VehicleStatus') ?>

    <?php // echo $form->field($model, 'TrailerStatus') ?>

    <?php // echo $form->field($model, 'IUNo') ?>

    <?php // echo $form->field($model, 'MDTNo') ?>

    <?php // echo $form->field($model, 'UsageType') ?>

    <?php // echo $form->field($model, 'Remark') ?>

    <?php // echo $form->field($model, 'CBy') ?>

    <?php // echo $form->field($model, 'CDate') ?>

    <?php // echo $form->field($model, 'MBy') ?>

    <?php // echo $form->field($model, 'MDate') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
