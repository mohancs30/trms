<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mstcustomer */

$this->title = 'Create Mstcustomer';
$this->params['breadcrumbs'][] = ['label' => 'Mstcustomers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstcustomer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
