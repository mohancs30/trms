<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mstlocation */

$this->title = 'Create Mstlocation';
$this->params['breadcrumbs'][] = ['label' => 'Mstlocations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstlocation-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
