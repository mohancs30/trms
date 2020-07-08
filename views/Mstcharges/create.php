<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mstcharges */

$this->title = 'Create Mstcharges';
$this->params['breadcrumbs'][] = ['label' => 'Mstcharges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstcharges-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
