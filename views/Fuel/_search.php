<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fuelsearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fuel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'vehicleregno') ?>

    <?= $form->field($model, 'vehicletype') ?>

    <?= $form->field($model, 'vehicle_desc') ?>

    <?= $form->field($model, 'fuel_date') ?>

    <?php // echo $form->field($model, 'fuel_station') ?>

    <?php // echo $form->field($model, 'mtr_read') ?>

    <?php // echo $form->field($model, 'ltr_pump') ?>

    <?php // echo $form->field($model, 'ltr_price') ?>

    <?php // echo $form->field($model, 'fill_type') ?>

    <?php // echo $form->field($model, 'last_milage') ?>

    <?php // echo $form->field($model, 'driver') ?>

    <?php // echo $form->field($model, 'c_by') ?>

    <?php // echo $form->field($model, 'c_date') ?>

    <?php // echo $form->field($model, 'm_by') ?>

    <?php // echo $form->field($model, 'm_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
