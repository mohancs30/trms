<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mstcustomer */


$this->params['breadcrumbs'][] = ['label' => 'Mstcustomers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstcustomer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'customer_id',
            'customer_name',
            'c_address1',
            'c_address2',
            'c_address3',
            'c_contactno',
            'c_email:email',
            'status',
            'remark',
            'C_By',
            'C_Date',
            'M_By',
            'M_Date',
        ],
    ]) ?>

</div>
