<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mstgroupcode */

$this->title = 'Update Mstgroupcode: ' . $model->Code;
$this->params['breadcrumbs'][] = ['label' => 'Mstgroupcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Code, 'url' => ['view', 'id' => $model->Code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mstgroupcode-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
