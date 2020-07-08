<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MstlocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mstlocations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstlocation-index">

  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mstlocation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TableId',
            'LocCode',
            'LocName',
            'LocSecondName',
            'LocType',
            // 'ContactPerson',
            // 'PhoneNo1',
            // 'PhoneNo2',
            // 'MobileNo',
            // 'FaxNo',
            // 'EmailId:email',
            // 'Address1',
            // 'Address2',
            // 'Address3',
            // 'PostalCode',
            // 'LocStatus',
            // 'Remark',
            // 'CBy',
            // 'CDate',
            // 'MBy',
            // 'MDate',
            // 'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
