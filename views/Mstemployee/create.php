<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mstemployee */

$this->title = 'Create Mstemployee';
$this->params['breadcrumbs'][] = ['label' => 'Mstemployees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstemployee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
