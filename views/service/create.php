<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Servicecontract */

$this->title = 'Create Servicecontract';
$this->params['breadcrumbs'][] = ['label' => 'Servicecontracts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicecontract-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
