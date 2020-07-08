<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MstcustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mstcustomers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstcustomer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mstcustomer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'customer_id',
            'customer_name',
            'c_address1',
            'c_address2',
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
