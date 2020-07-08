<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\mstgroupcode;
use app\models\MstgroupcodeSearch;
use yii\base\Object;
use yii\helpers\CONSTANTS;
use yii\helpers\ArrayHelper;
use yii\gii\CodeFile;
use app\models\mstgroupcodeQuery;
/* @var $this yii\web\View */
/* @var $model app\models\Mstgroupcode */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="mstgroupcode-form">
    <?php $form = ActiveForm::begin(); ?>
     <section class="content-header">
      <h1>
        Group Code Master
        <!--<small>Preview</small> -->
      </h1>
    </section>


     <div class="row">
         <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Group Code Details</h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
            <div class="box-body">
              <div class="form-group">
              <div class="col-md-2 redcolor">  <?= $form->field($model, 'GroupCodeName')->textInput(['maxlength' => true, 'placeholder' =>'25 AN']) ?>	  </div>
              <div class="col-md-1 redcolor">  <?= $form->field($model, 'Code')->textInput(['maxlength' => true,'placeholder' =>'12 AN']) ?>  </div>
              <div class="col-md-2 redcolor">  <?= $form->field($model, 'CodedDesc')->textInput(['maxlength' => true,'placeholder' =>'50 AN']) ?>	</div>
              <div class="col-md-3">  <?= $form->field($model, 'ExtraInfo')->textInput(['maxlength' => true]) ?>	</div>
            </div>
              <!-- /.form group -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class= "allign_center">
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'button' : 'button'])  ?> </div>
                <div class="col-md-3">   <p class="errormsg" ><b> Please Enter Required Field </b> </p> </div>
                <div class="col-md-6"> <p class="infomsg" > <b> AN : Alpha Numeric; Char : Character </b> </p> </div>
            </div>
          </div>
         </div>
          <!-- /.box -->
     </div>
    <?php ActiveForm::end(); ?>
</div>

<div>
<?php
    $dataProvider = new ActiveDataProvider([
        'query' => Mstgroupcode::find(),
        'pagination' => [
        'pageSize' => 5,
        ],
    ]);
?>
<?php  
   $searchModel = New MstgroupcodeSearch(); 
   $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
   ?>
<?php yii\widgets\Pjax::begin(['id' => 'new_codegroup']) ?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             'GroupCodeName',
            'Code',
            'CodedDesc',
            'ExtraInfo',
          //  'Logic',
          //  'Status',
          //  'UserEdit',
          //  'CBy',
          //  'CDate',
          //  'MBy',
          //  'MDate',
            

            ['class' => 'yii\grid\ActionColumn',
                'contentOptions'=>['style'=>'width:50px'],
                ],
        ],
    ]); ?>
 <?php yii\widgets\Pjax::end() ?>
</div>

