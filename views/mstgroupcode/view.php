<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mstgroupcode */

$this->title = $model->Code;
$this->params['breadcrumbs'][] = ['label' => 'Mstgroupcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mstgroupcode-view">

    

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Code], [
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
            'GroupCodeName',
            'Code',
            'CodedDesc',
            'ExtraInfo',
            'Logic',
            'Status',
            'UserEdit',
            'CBy',
            'CDate',
            'MBy',
            'MDate',
        ],
    ]) ?>

</div>
