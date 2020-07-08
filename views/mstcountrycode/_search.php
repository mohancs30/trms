<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MstcountrycodeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mstcountrycode-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TableId') ?>

    <?= $form->field($model, 'CountryCode') ?>

    <?= $form->field($model, 'CountryName') ?>

    <?= $form->field($model, 'ShortName') ?>

    <?= $form->field($model, 'Remark') ?>

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
