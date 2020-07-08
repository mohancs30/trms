<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mstcharges */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mstcharges-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'vechicletype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Avl' => 'Avl', 'Navl' => 'Navl', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CBy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MBy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cdate')->textInput() ?>

    <?= $form->field($model, 'Mdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
