<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mstlocation */

$this->title = 'Update Mstlocation: ' . $model->LocCode;
$this->params['breadcrumbs'][] = ['label' => 'Mstlocations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->LocCode, 'url' => ['view', 'id' => $model->LocCode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mstlocation-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
