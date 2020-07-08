<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Fuelsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fuels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fuel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'vehicleregno',
            'vehicletype',
            'vehicle_desc',
            'fuel_date',
            // 'fuel_station',
            // 'mtr_read',
            // 'ltr_pump',
            // 'ltr_price',
            // 'fill_type',
            // 'last_milage',
            // 'driver',
            // 'c_by',
            // 'c_date',
            // 'm_by',
            // 'm_date',
            // 'status',
            // 'remark',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
