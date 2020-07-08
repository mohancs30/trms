<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mstcompany */

$this->title = $model->CompCode;
$this->params['breadcrumbs'][] = ['label' => 'Mstcompanies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstcompany-view">

    

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CompCode], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CompCode], [
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
            'CompCode',
            'CompRegNo',
            'CompName1',
            'CompName2',
            'ShortName',
            'CompGstNo',
            'ContactPerson',
            'PhoneNo1',
            'PhoneNo2',
            'MobileNo',
            'FaxNo',
            'CurrencyCode',
            'CountryCode',
            'EmailID:email',
            'WebSite',
            'Address11',
            'Address12',
            'Address13',
            'PostalCode1',
            'Address21',
            'Address22',
            'Address23',
            'PostalCode2',
            'CBy',
            'CDate',
            'MBy',
            'MDate',
            'Status',
        ],
    ]) ?>

</div>
