<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mstcountrycode */

$this->title = 'Update Mstcountrycode: ' . $model->CountryCode;
$this->params['breadcrumbs'][] = ['label' => 'Mstcountrycodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CountryCode, 'url' => ['view', 'id' => $model->CountryCode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mstcountrycode-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
