<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mstcountrycode */

$this->title = $model->CountryCode;
$this->params['breadcrumbs'][] = ['label' => 'Mstcountrycodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstcountrycode-view">

   

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CountryCode], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CountryCode], [
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
            'CountryCode',
            'CountryName',
            'ShortName',
            'Remark',
            'CBy',
            'CDate',
            'MBy',
            'MDate',
            'Status',
        ],
    ]) ?>

</div>
