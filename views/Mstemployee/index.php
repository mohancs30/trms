<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MstempSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mstemployees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstemployee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mstemployee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TableId',
            'EmpCode',
            'EmpName',
            'ShortName',
            'CompCode',
            //'EmpIcNo',
            //'Department',
            //'Designation',
            //'EmpContactPerson',
            //'PhoneNo1',
            //'MobileNo1',
            //'MobileNo2',
            //'FaxNo',
            //'DOJ',
            //'DOB',
            //'DOL',
            //'EmailID:email',
            //'DrivLicNo',
            //'DrivLicType',
            //'DrivLicIssDate',
            //'DrivLicExpDate',
            //'Nationality',
            //'EmpPhoto',
            //'Address11',
            //'Address12',
            //'Address13',
            //'PostalCode1',
            //'Address21',
            //'Address22',
            //'Address23',
            //'PostalCode2',
            //'EmpStatus',
            //'CBy',
            //'CDate',
            //'MBy',
            //'MDate',
            //'UserStatus',
            //'DriverStatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
