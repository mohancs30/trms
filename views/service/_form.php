<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Servicecontract */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicecontract-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'customer_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contract_ref_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'workshop_address1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_address2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_address3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_contactno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'A' => 'A', 'IA' => 'IA', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'C_By')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'C_Date')->textInput() ?>

    <?= $form->field($model, 'M_By')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'M_Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
