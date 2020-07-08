<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MstvehicleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicle List';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="mstvehicle-index">
	
    <h1><?= Html::encode($this->title) ?></h1>
	
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'TableId',
            'CompCode',
            'VehicleRegNo',
            'VehicleDesc',
            //'VehicleName',
            //'VehicleType',
            //'VehicleJobType',
            //'Size',
            //'VehicleEngNo',
            'BrandName',
            //'YearOfMFG',
            //'MakeModel',
            //'ChassisNo',
            //'LadenWight',
            //'UnLadenWight',
            //'RegDate',
            //'EffDateOwner',
            //'COEExpiry',
            'RoadTaxFrom',
            'RoadTaxTo',
            'RoadTaxDue',
            //'InsurFrom',
            'InsurTo',
            //'InsurDue',
            //'CurrentLocation',
            //'PermitFrom',
            'PermitTo',
            //'VPCFrom',
            'VPCTo',
			
            //'ROBDate',
            //'LoadingCapacity',
            //'VehicleCondition',
            //'VehicleStatus',
            //'TrailerStatus',
            //'IUNo',
            //'MDTNo',
            //'UsageType',
            //'Remark',
            //'CBy',
            //'CDate',
            //'MBy',
            //'MDate',
            //'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



</div>
