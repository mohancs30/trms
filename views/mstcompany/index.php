<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MstcompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mstcompanies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstcompany-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mstcompany', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TableId',
            'CompCode',
            'CompRegNo',
            'CompName1',
            'CompName2',
            // 'ShortName',
            // 'CompGstNo',
            // 'ContactPerson',
            // 'PhoneNo1',
            // 'PhoneNo2',
            // 'MobileNo',
            // 'FaxNo',
            // 'CurrencyCode',
            // 'CountryCode',
            // 'EmailID:email',
            // 'WebSite',
            // 'Address11',
            // 'Address12',
            // 'Address13',
            // 'PostalCode1',
            // 'Address21',
            // 'Address22',
            // 'Address23',
            // 'PostalCode2',
            // 'CBy',
            // 'CDate',
            // 'MBy',
            // 'MDate',
            // 'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
