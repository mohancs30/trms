<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fuel */

$this->title = 'Create Fuel';
$this->params['breadcrumbs'][] = ['label' => 'Fuels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
