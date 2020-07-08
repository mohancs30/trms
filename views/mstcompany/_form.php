    <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Mstcompany;
use app\models\MstcompanySearch;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Mstcurrencycode;
use app\models\Mstcountrycode;
use app\models\Mstemployee;
/* @var $this yii\web\View */
/* @var $model app\models\Mstcompany */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="mstcompany-form">
    <?php $form = ActiveForm::begin(); ?>
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Company Master
       <!-- <small>Preview</small> -->
      </h1>
    </section>
 <div class="row">
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Confidential Info</h3>
              <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-2 redcolor">  <?= $form->field($model, 'CompCode')->textInput(['maxlength' => 10,'placeholder' => '10 AN']) ?>   </div>
                    <div class="col-md-3 redcolor">   <?= $form->field($model, 'CompRegNo')->textInput(['maxlength' => 12,'placeholder' => '12 AN ']) ?>    </div>
                    <div class="col-md-6 redcolor"> <?= $form->field($model, 'CompName1')->textInput(['maxlength' => 50,'placeholder' => '50 AN ' ]) ?>  </div>
                    <div class="col-md-4">  <?= $form->field($model, 'CompName2')->textInput(['maxlength' => 50,'placeholder' => '50 AN ' ]) ?>	 </div>
                    <div class="col-md-3">  <?= $form->field($model, 'ShortName')->textInput(['maxlength' => 30, 'placeholder' => '30  AN' ]) ?>	 </div>
                    <div class="col-md-4">  
                    <?=   $form->field($model, 'CountryCode')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Mstcountrycode::find()-> all(),'CountryCode' ,'CountryName'),
                    'theme' => Select2::THEME_CLASSIC,
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select a Country ...'],
                    'pluginOptions' => [
                    'allowClear' => true   ],
                    ]);
                    ?>
                    </div>
                    <div class="col-md-4">  
                    <?=   $form->field($model, 'CurrencyCode')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Mstcurrencycode::find()->asArray()->all(),
                    'CurrencyCode',
                    function($model, $defaultValue) {
                        return $model['CurrencyCode'].'-'.$model['CurrencyName'];
                    } ),
                    'theme' => Select2::THEME_CLASSIC,
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select a Currency ...'],
                    'pluginOptions' => [
                    'allowClear' => true   ],
                    ]);
                    ?>
                    </div>
                    <div class="col-md-3 redcolor"> <?= $form->field($model, 'CompGstNo')->textInput(['maxlength' => 12,'placeholder' => '12 AN']) ?>   </div>  
                    <div class="col-md-1 redcolor"> <?= $form->field($model, 'GST')->textInput(['maxlength' => true,'placeholder' => 'GST %']) ?>   </div>  
                    <div class="col-md-4">  
                    <?=   $form->field($model, 'ContactPerson')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(MstEmployee::find()-> all(),'EmpCode' ,'EmpName'),
                    'theme' => Select2::THEME_CLASSIC,
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select a Contact ...'],
                    'pluginOptions' => [
                    'allowClear' => true   ],
                    ]);
                    ?>
                    </div>
                    <div class="col-md-2 redcolor"> <?= $form->field($model, 'PhoneNo1')->textInput(['maxlength' => 12,'placeholder' => '12 Digit']) ?>   </div>
                    <div class="col-md-2">  <?= $form->field($model, 'PhoneNo2')->textInput(['maxlength' => 12,'placeholder' => '12 Digit']) ?>  </div>  
                    <div class="col-md-2 redcolor"> <?= $form->field($model, 'MobileNo')->textInput(['maxlength' => 12,'placeholder' => '12 Digit']) ?>  </div>
                    <div class="col-md-2">  <?= $form->field($model, 'FaxNo')->textInput(['maxlength' => 12,'placeholder' => '12 Digit']) ?>  </div> 
                </div>
              <!-- /.form group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (left) -->
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Communication Details</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <div class="box-body">
              <!-- Date -->
                <div class="form-group">
		            
                    <div class="col-md-4 redcolor">  <?= $form->field($model, 'Address11')->textInput(['maxlength' => 50,'placeholder' => '50 AN']) ?>  </div>
                    <div class="col-md-3 redcolor">  <?= $form->field($model, 'Address12')->textInput(['maxlength' => 50, 'placeholder' => '50 AN']) ?>   </div>
                    <div class="col-md-3 redcolor">  
                    <?=   $form->field($model, 'Address13')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Mstcountrycode::find()-> all(),'CountryCode' ,'CountryName'),
                    'theme' => Select2::THEME_CLASSIC,
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select a Country ...'],
                    'pluginOptions' => [
                    'allowClear' => true   ],
                    ]);
                    ?>
                    </div>
                    <div class="col-md-2 redcolor">  <?= $form->field($model, 'PostalCode1')->textInput(['maxlength' => 6,'placeholder' => '6 AN']) ?>  </div>
                    <div class="col-md-4">  <?= $form->field($model, 'Address21')->textInput(['maxlength' => 50,'placeholder' => '50 AN']) ?>   </div>   
                    <div class="col-md-3">  <?= $form->field($model, 'Address22')->textInput(['maxlength' => 50,'placeholder' => '50 AN']) ?>  </div>	
                    <div class="col-md-3">  
                    <?=   $form->field($model, 'Address23')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Mstcountrycode::find()-> all(),'CountryCode' ,'CountryName'),
                    'theme' => Select2::THEME_CLASSIC,
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select a Country ...'],
                    'pluginOptions' => [
                    'allowClear' => true   ],
                    ]);
                    ?>
                    </div>
                    <div class="col-md-2"> <?= $form->field($model, 'PostalCode2')->textInput(['maxlength' => 6,'placeholder' => '6 AN']) ?>   </div>  
                    <div class="col-md-5 redcolor">  <?= $form->field($model, 'EmailID')->textInput(['maxlength' => 50,'placeholder' => '50 AN Valid Email']) ?>   </div>
                    <div class="col-md-5">  <?= $form->field($model, 'WebSite')->textInput(['maxlength' => 50, 'placeholder' => '50 AN']) ?>  </div>
                    </div>
              <!-- /.form group -->
            </div><!-- /.box-body -->
                             
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
        <!-- /.col (right) -->
     <?php ActiveForm::end(); ?>
</div>

<div class="mstcompany-index">
<?php
    $dataProvider = new ActiveDataProvider([
        'query' => Mstcompany::find(),
        'pagination' => [
        'pageSize' => 5,
        ],
    ]);
?>
<?php  
   $searchModel = New MstcompanySearch(); 
   $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
   ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'TableId',
            'CompCode',
            'CompRegNo',
            'CompName1',
            //'CompName2',
             'ShortName',
             'CompGstNo',
             //'ContactPerson',
            [
                'attribute'=>'ContactPerson',
                'value'=>'empName.EmpName',
            ],
             'PhoneNo1',
            // 'PhoneNo2',
            // 'MobileNo',
            // 'FaxNo',
            // 'CurrencyCode',
             [
                'attribute'=>'CurrencyCode',
                'value'=>'currencycode.CurrencyName',
             ],
            //'CountryCode',
             [
                'attribute'=>'CountryCode',
                'value'=>'countrycode.CountryName',
             ],
             'EmailID:email',
             'WebSite',
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

            ['class' => 'yii\grid\ActionColumn',
                'contentOptions'=>['style'=>'width:50px'],
            ],
        ],
    ]); ?>

</div>