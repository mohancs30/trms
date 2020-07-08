<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fuel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fuels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'vehicleregno',
            'vehicletype',
            'vehicle_desc',
            'fuel_date',
            'fuel_station',
            'mtr_read',
            'ltr_pump',
            'ltr_price',
            'fill_type',
            'last_milage',
            'driver',
            'c_by',
            'c_date',
            'm_by',
            'm_date',
            'status',
            'remark',
        ],
    ]) ?>

</div>
