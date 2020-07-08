<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mstcompany */

$this->title = 'Create Mstcompany';
$this->params['breadcrumbs'][] = ['label' => 'Mstcompanies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstcompany-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
