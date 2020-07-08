<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Mstcountrycode;
use app\models\MstcountrycodeSearch;
/* @var $this yii\web\View */
/* @var $model app\models\Mstcountrycode */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="mstcountrycode-form">
    <?php $form = ActiveForm::begin(); ?>
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Country Master
        <!--  <small>Preview </small> -->
      </h1>
    </section>
<!-- Main content Left Side  -->
<div class="row">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Country Code </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                    <div class="col-md-2 redcolor">  <?= $form->field($model, 'CountryCode')->textInput(['maxlength' => 12,'placeholder'=>'12 AN' ]) ?>  </div>
                    <div class="col-md-3 redcolor">  <?= $form->field($model, 'CountryName')->textInput(['maxlength' => 50,'placeholder'=>'50 AN']) ?>    </div>
                    <div class="col-md-2"> <?= $form->field($model, 'ShortName')->textInput(['maxlength' => 30,'placeholder'=>'30 AN' ]) ?>   </div>
                    <div class="col-md-4">  <?= $form->field($model, 'Remark')->textInput(['maxlength' => 150,'placeholder'=>'150 AN' ]) ?>	</div>
                </div>
              <!-- /.form group -->
            </div>
            <!-- /.box-body -->
                <div class="box-footer">
                    <div class="allign_center"> <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'button' : 'button']) ?> </div>
                    <div class="col-md-3">   <p class="errormsg" ><b> Please Enter Required Field </b> </p> </div>
                    <div class="col-md-6"> <p class="infomsg" > <b> AN : Alpha Numeric; Char : Character </b> </p> </div>
                    <!--   Visit <a href="">Select2 documentation</a> for more examples and information about	 
                  the plugin. -->
                </div>
          </div>
          <!-- /.box -->
     </div>
    <?php ActiveForm::end(); ?>
</div>

<div>
<?php
    $dataProvider = new ActiveDataProvider([
        'query' => Mstcountrycode::find(),
        'pagination' => [
        'pageSize' => 5,
        ],
    ]);
?>
<?php  
   $searchModel = New MstcountrycodeSearch(); 
   $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
   ?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
          //  'TableId',
            'CountryCode',
            'CountryName',
            'ShortName',
            'Remark',
           // 'CBy',
           // 'CDate',
           // 'MBy',
           // 'MDate',
           // 'Status',
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions'=>['style'=>'width:50px'],
            ],
        ],
    ]); ?>
</div>
