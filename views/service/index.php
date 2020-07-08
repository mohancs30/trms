<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServicecontractSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicecontracts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicecontract-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Servicecontract', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'customer_id',
            'contract_ref_no',
            'company_name',
            'workshop_address1',
            // 'c_address2',
            // 'c_address3',
            // 'c_contactno',
            // 'c_email:email',
            // 'status',
            // 'remark',
            // 'C_By',
            // 'C_Date',
            // 'M_By',
            // 'M_Date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
