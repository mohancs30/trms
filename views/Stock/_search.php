<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\stocksearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Type') ?>

    <?= $form->field($model, 'Date') ?>

    <?= $form->field($model, 'Item_code') ?>

    <?= $form->field($model, 'Unit_cost') ?>

    <?php // echo $form->field($model, 'Qty') ?>

    <?php // echo $form->field($model, 'PO_ref') ?>

    <?php // echo $form->field($model, 'Brand') ?>

    <?php // echo $form->field($model, 'Descr') ?>

    <?php // echo $form->field($model, 'Supplier') ?>

    <?php // echo $form->field($model, 'Cost') ?>

    <?php // echo $form->field($model, 'C_by') ?>

    <?php // echo $form->field($model, 'C_date') ?>

    <?php // echo $form->field($model, 'M_by') ?>

    <?php // echo $form->field($model, 'M_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
