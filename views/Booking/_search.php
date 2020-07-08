<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'B_id') ?>

    <?= $form->field($model, 'Movetype') ?>

    <?= $form->field($model, 'Qty') ?>

    <?= $form->field($model, 'Arrivaltime') ?>

    <?= $form->field($model, 'status') ?>
	
    <?=$form->field($model, 'VehicleRegNo') ?>
	
	<?=$form->field($model, 'bookingref_no') ?>

    <?=$form->field($model, 'C_date') ?>

    <?=$form->field($model, 'C_By') ?>

    <?php // echo $form->field($model, 'M_date') ?>

    <?php // echo $form->field($model, 'M_By') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
