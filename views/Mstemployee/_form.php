<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mstemployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mstemployee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TableId')->textInput() ?>

    <?= $form->field($model, 'EmpCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EmpName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ShortName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CompCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EmpIcNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Designation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EmpContactPerson')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PhoneNo1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MobileNo1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MobileNo2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FaxNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DOJ')->textInput() ?>

    <?= $form->field($model, 'DOB')->textInput() ?>

    <?= $form->field($model, 'DOL')->textInput() ?>

    <?= $form->field($model, 'EmailID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DrivLicNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DrivLicType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DrivLicIssDate')->textInput() ?>

    <?= $form->field($model, 'DrivLicExpDate')->textInput() ?>

    <?= $form->field($model, 'Nationality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EmpPhoto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address11')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address12')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address13')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PostalCode1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address21')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address22')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address23')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PostalCode2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EmpStatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CBy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CDate')->textInput() ?>

    <?= $form->field($model, 'MBy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MDate')->textInput() ?>

    <?= $form->field($model, 'UserStatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DriverStatus')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
