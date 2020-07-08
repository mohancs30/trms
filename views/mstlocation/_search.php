<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MstlocationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mstlocation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TableId') ?>

    <?= $form->field($model, 'LocCode') ?>

    <?= $form->field($model, 'LocName') ?>

    <?= $form->field($model, 'LocSecondName') ?>

    <?= $form->field($model, 'LocType') ?>

    <?php // echo $form->field($model, 'ContactPerson') ?>

    <?php // echo $form->field($model, 'PhoneNo1') ?>

    <?php // echo $form->field($model, 'PhoneNo2') ?>

    <?php // echo $form->field($model, 'MobileNo') ?>

    <?php // echo $form->field($model, 'FaxNo') ?>

    <?php // echo $form->field($model, 'EmailId') ?>

    <?php // echo $form->field($model, 'Address1') ?>

    <?php // echo $form->field($model, 'Address2') ?>

    <?php // echo $form->field($model, 'Address3') ?>

    <?php // echo $form->field($model, 'PostalCode') ?>

    <?php // echo $form->field($model, 'LocStatus') ?>

    <?php // echo $form->field($model, 'Remark') ?>

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
