<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mstcompany */

$this->title = 'Update Mstcompany: ' . $model->CompCode;
$this->params['breadcrumbs'][] = ['label' => 'Mstcompanies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CompCode, 'url' => ['view', 'id' => $model->CompCode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mstcompany-update">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
