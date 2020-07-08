<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MstcompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mstcompany-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TableId') ?>

    <?= $form->field($model, 'CompCode') ?>

    <?= $form->field($model, 'CompRegNo') ?>

    <?= $form->field($model, 'CompName1') ?>

    <?= $form->field($model, 'CompName2') ?>

    <?php // echo $form->field($model, 'ShortName') ?>

    <?php // echo $form->field($model, 'CompGstNo') ?>

    <?php // echo $form->field($model, 'ContactPerson') ?>

    <?php // echo $form->field($model, 'PhoneNo1') ?>

    <?php // echo $form->field($model, 'PhoneNo2') ?>

    <?php // echo $form->field($model, 'MobileNo') ?>

    <?php // echo $form->field($model, 'FaxNo') ?>

    <?php // echo $form->field($model, 'CurrencyCode') ?>

    <?php // echo $form->field($model, 'CountryCode') ?>

    <?php // echo $form->field($model, 'EmailID') ?>

    <?php // echo $form->field($model, 'WebSite') ?>

    <?php // echo $form->field($model, 'Address11') ?>

    <?php // echo $form->field($model, 'Address12') ?>

    <?php // echo $form->field($model, 'Address13') ?>

    <?php // echo $form->field($model, 'PostalCode1') ?>

    <?php // echo $form->field($model, 'Address21') ?>

    <?php // echo $form->field($model, 'Address22') ?>

    <?php // echo $form->field($model, 'Address23') ?>

    <?php // echo $form->field($model, 'PostalCode2') ?>

    <?php // echo $form->field($model, 'CBy') ?>

    <?php // echo $form->field($model, 'CDate') ?>

    <?php // echo $form->field($model, 'MBy') ?>

    <?php // echo $form->field($model, 'MDate') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
