<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mstvehicle */


$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mstvehicle-view">

    <h1><?= Html::encode($this->title) ?></h1>
	<p>
        <?= Html::a('Back to List', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->TableId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->TableId], [
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
            'TableId',
            'CompCode',
            'VehicleRegNo',
            'VehicleDesc',
            'VehicleName',
            'VehicleType',
            'VehicleJobType',
            'Size',
            'VehicleEngNo',
            'BrandName',
            'YearOfMFG',
            'MakeModel',
            'ChassisNo',
            'LadenWight',
            'UnLadenWight',
            'RegDate',
            'EffDateOwner',
            'COEExpiry',
            'RoadTaxFrom',
            'RoadTaxTo',
            'RoadTaxDue',
            'InsurFrom',
            'InsurTo',
            'InsurDue',
            'CurrentLocation',
            'PermitFrom',
            'PermitTo',
            'VPCFrom',
            'VPCTo',
            'ROBDate',
            'LoadingCapacity',
            'VehicleCondition',
            'VehicleStatus',
            'TrailerStatus',
            'IUNo',
            'MDTNo',
            'UsageType',
            'Remark',
            'CBy',
            'CDate',
            'MBy',
            'MDate',
            'Status',
        ],
    ]) ?>

</div>
