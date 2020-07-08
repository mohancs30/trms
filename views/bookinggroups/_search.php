<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookinggroupsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bookinggroups-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'groups') ?>

    <?= $form->field($model, 'movetype') ?>

    <?= $form->field($model, 'vehicletype') ?>

    <?= $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'req_qty') ?>

    <?php // echo $form->field($model, 'avl_qty') ?>

    <?php // echo $form->field($model, 'bref_no') ?>

    <?php // echo $form->field($model, 'Arrival_date') ?>

    <?php // echo $form->field($model, 'From_date') ?>

    <?php // echo $form->field($model, 'To_date') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'c_by') ?>

    <?php // echo $form->field($model, 'c_date') ?>

    <?php // echo $form->field($model, 'm_by') ?>

    <?php // echo $form->field($model, 'm_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
