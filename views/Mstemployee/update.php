<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mstemployee */

$this->title = 'Update Mstemployee: ' . $model->TableId;
$this->params['breadcrumbs'][] = ['label' => 'Mstemployees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TableId, 'url' => ['view', 'id' => $model->TableId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mstemployee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
