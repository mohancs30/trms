<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MstgroupcodeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mstgroupcode-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'GroupCodeName') ?>

    <?= $form->field($model, 'Code') ?>

    <?= $form->field($model, 'CodedDesc') ?>

    <?= $form->field($model, 'ExtraInfo') ?>

    <?= $form->field($model, 'Logic') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'UserEdit') ?>

    <?php // echo $form->field($model, 'CBy') ?>

    <?php // echo $form->field($model, 'CDate') ?>

    <?php // echo $form->field($model, 'MBy') ?>

    <?php // echo $form->field($model, 'MDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
