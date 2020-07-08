<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fuel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fuel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vehicleregno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehicletype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehicle_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fuel_date')->textInput() ?>

    <?= $form->field($model, 'fuel_station')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mtr_read')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ltr_pump')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ltr_price')->textInput() ?>

    <?= $form->field($model, 'fill_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_milage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'driver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_date')->textInput() ?>

    <?= $form->field($model, 'm_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_date')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'A' => 'A', 'IA' => 'IA', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
