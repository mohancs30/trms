<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mstgroupcode */

$this->title = 'Create Mstgroupcode';
$this->params['breadcrumbs'][] = ['label' => 'Mstgroupcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstgroupcode-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
