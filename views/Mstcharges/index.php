<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MstchargesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mstcharges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstcharges-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mstcharges', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'vechicletype',
            'amount',
            'status',
            'remarks',
            //'CBy',
            //'MBy',
            //'Cdate',
            //'Mdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
