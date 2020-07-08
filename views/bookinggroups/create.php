<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bookinggroups */

$this->title = 'Create Bookinggroups';
$this->params['breadcrumbs'][] = ['label' => 'Bookinggroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookinggroups-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
