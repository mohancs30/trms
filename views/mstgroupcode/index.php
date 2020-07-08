<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MstgroupcodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mstgroupcodes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstgroupcode-index">

  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mstgroupcode', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'GroupCodeName',
            'Code',
            'CodedDesc',
            'ExtraInfo',
            'Logic',
            // 'Status',
            // 'UserEdit',
            // 'CBy',
            // 'CDate',
            // 'MBy',
            // 'MDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
