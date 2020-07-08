<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MstcustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mstcustomer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'c_address1') ?>

    <?= $form->field($model, 'c_address2') ?>

    <?php // echo $form->field($model, 'c_address3') ?>

    <?php // echo $form->field($model, 'c_contactno') ?>

    <?php // echo $form->field($model, 'c_email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'C_By') ?>

    <?php // echo $form->field($model, 'C_Date') ?>

    <?php // echo $form->field($model, 'M_By') ?>

    <?php // echo $form->field($model, 'M_Date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
