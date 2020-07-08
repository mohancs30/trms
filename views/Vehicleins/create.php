<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vechicleins */

$this->params['breadcrumbs'][] = ['label' => 'Vechicleins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vechicleins-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
