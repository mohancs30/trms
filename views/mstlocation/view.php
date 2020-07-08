<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mstlocation */

$this->title = $model->LocCode;
$this->params['breadcrumbs'][] = ['label' => 'Mstlocations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstlocation-view">

  
<!-- Samsad: Change $model->LocCode to $model->TableId in HTML a tag. Reason: Primary key of table MstLocation is TableId and not LocCode -->
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
            'LocCode',
            'LocName',
            'LocSecondName',
            'LocType',
            'ContactPerson',
            'PhoneNo1',
            'PhoneNo2',
            'MobileNo',
            'FaxNo',
            'EmailId:email',
            'Address1',
            'Address2',
            'Address3',
            'PostalCode',
            'LocStatus',
            'Remark',
            'CBy',
            'CDate',
            'MBy',
            'MDate',
            'Status',
        ],
    ]) ?>

</div>
