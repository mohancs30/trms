<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MstempSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mstemployee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TableId') ?>

    <?= $form->field($model, 'EmpCode') ?>

    <?= $form->field($model, 'EmpName') ?>

    <?= $form->field($model, 'ShortName') ?>

    <?= $form->field($model, 'CompCode') ?>

    <?php // echo $form->field($model, 'EmpIcNo') ?>

    <?php // echo $form->field($model, 'Department') ?>

    <?php // echo $form->field($model, 'Designation') ?>

    <?php // echo $form->field($model, 'EmpContactPerson') ?>

    <?php // echo $form->field($model, 'PhoneNo1') ?>

    <?php // echo $form->field($model, 'MobileNo1') ?>

    <?php // echo $form->field($model, 'MobileNo2') ?>

    <?php // echo $form->field($model, 'FaxNo') ?>

    <?php // echo $form->field($model, 'DOJ') ?>

    <?php // echo $form->field($model, 'DOB') ?>

    <?php // echo $form->field($model, 'DOL') ?>

    <?php // echo $form->field($model, 'EmailID') ?>

    <?php // echo $form->field($model, 'DrivLicNo') ?>

    <?php // echo $form->field($model, 'DrivLicType') ?>

    <?php // echo $form->field($model, 'DrivLicIssDate') ?>

    <?php // echo $form->field($model, 'DrivLicExpDate') ?>

    <?php // echo $form->field($model, 'Nationality') ?>

    <?php // echo $form->field($model, 'EmpPhoto') ?>

    <?php // echo $form->field($model, 'Address11') ?>

    <?php // echo $form->field($model, 'Address12') ?>

    <?php // echo $form->field($model, 'Address13') ?>

    <?php // echo $form->field($model, 'PostalCode1') ?>

    <?php // echo $form->field($model, 'Address21') ?>

    <?php // echo $form->field($model, 'Address22') ?>

    <?php // echo $form->field($model, 'Address23') ?>

    <?php // echo $form->field($model, 'PostalCode2') ?>

    <?php // echo $form->field($model, 'EmpStatus') ?>

    <?php // echo $form->field($model, 'CBy') ?>

    <?php // echo $form->field($model, 'CDate') ?>

    <?php // echo $form->field($model, 'MBy') ?>

    <?php // echo $form->field($model, 'MDate') ?>

    <?php // echo $form->field($model, 'UserStatus') ?>

    <?php // echo $form->field($model, 'DriverStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
