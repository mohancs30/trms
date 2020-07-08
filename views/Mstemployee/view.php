<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mstemployee */

$this->title = $model->TableId;
$this->params['breadcrumbs'][] = ['label' => 'Mstemployees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mstemployee-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'EmpCode',
            'EmpName',
            'ShortName',
            'CompCode',
            'EmpIcNo',
            'Department',
            'Designation',
            'EmpContactPerson',
            'PhoneNo1',
            'MobileNo1',
            'MobileNo2',
            'FaxNo',
            'DOJ',
            'DOB',
            'DOL',
            'EmailID:email',
            'DrivLicNo',
            'DrivLicType',
            'DrivLicIssDate',
            'DrivLicExpDate',
            'Nationality',
            'EmpPhoto',
            'Address11',
            'Address12',
            'Address13',
            'PostalCode1',
            'Address21',
            'Address22',
            'Address23',
            'PostalCode2',
            'EmpStatus',
            'CBy',
            'CDate',
            'MBy',
            'MDate',
            'UserStatus',
            'DriverStatus',
        ],
    ]) ?>

</div>
