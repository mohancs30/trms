<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MstcountrycodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mstcountrycodes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstcountrycode-index">

  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mstcountrycode', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TableId',
            'CountryCode',
            'CountryName',
            'ShortName',
            'Remark',
            // 'CBy',
            // 'CDate',
            // 'MBy',
            // 'MDate',
            // 'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
