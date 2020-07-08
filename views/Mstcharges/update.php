<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mstcharges */

$this->title = 'Update Mstcharges: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mstcharges', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mstcharges-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
