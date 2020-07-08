<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\stock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Date')->textInput() ?>

    <?= $form->field($model, 'Item_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Unit_cost')->textInput() ?>

    <?= $form->field($model, 'Qty')->textInput() ?>

    <?= $form->field($model, 'PO_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Supplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cost')->textInput() ?>

    <?= $form->field($model, 'C_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'C_date')->textInput() ?>

    <?= $form->field($model, 'M_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'M_date')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'A' => 'A', 'IA' => 'IA', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
