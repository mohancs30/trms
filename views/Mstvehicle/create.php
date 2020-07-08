<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mstvehicle */


$this->params['breadcrumbs'][] = ['label' => 'Mstvehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstvehicle-create">

    <h1><?= Html::encode($this->title) ?></h1>
	<p>
        <?= Html::a('Back to List', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
