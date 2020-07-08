<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Mstgroupcode;
use app\models\Mstcountrycode;
use yii\data\ActiveDataProvider;
use app\models\MstlocationSearch;
use kartik\select2\Select2;
use yii\grid\GridView;
use yii\helpers\CONSTANT;
/* @var $this yii\web\View */
/* @var $model app\models\Mstlocation */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <h3><span class="bg-red"><?= Yii::$app->session->getFlash('error') ?></span></h3>    
<?php endif; ?>

<div class="mstlocation-form">

       <?php $form = ActiveForm::begin(); ?>
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Location Master
       <!-- <small>Preview </small>  -->
      </h1>
      
    </section>
    
 <!-- Content Wrapper. Contains page content -->
     <!-- SELECT2 EXAMPLE -->
     <div class="row">
        <div class="col-md-6">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Location Details</h3>
              <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
            </div>
            <div class="box-body">
             
              <div class="form-group">
                            <div class="col-md-2 redcolor">  <?= $form->field($model, 'LocCode' )->textInput(['maxlength' => 24,'placeholder'=>'24 AN']) ?></div>
                              <div class="col-md-5 redcolor">  <?= $form->field($model, 'LocName')->textInput(['maxlength' => 50,'placeholder'=>'50 AN']) ?>   </div>
		            
                              <div class="col-md-4">  <?= $form->field($model, 'LocSecondName')->textInput(['maxlength' => 50 ,'placeholder'=>'50 AN',]) ?>   </div>
		            
                                <?php /*   $form->field($model, 'LocType')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Mstgroupcode::find()-> where (['GroupCodeName' => CONSTANT::$gLOCATIONTYPE ])-> all(),'Code','CodedDesc'),
                                'theme' => Select2::THEME_CLASSIC,
                                'language' => 'en',
                                'options' => ['placeholder' => 'Loc Type...'],
                                'pluginOptions' => [
                                'allowClear' => true   ],
                                ]); */
                                ?>
                          
                            <div class="col-md-3 redcolor">  
                                <?=   $form->field($model, 'LocGroup')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Mstgroupcode::find()-> where (['GroupCodeName' => CONSTANT::$gLOCATIONTYPE ])-> all(),'Code','CodedDesc'),
                                'theme' => Select2::THEME_CLASSIC,
                                'language' => 'en',
                                'options' => ['placeholder' => 'Location Group...'],
                                'pluginOptions' => [
                                'allowClear' => true   ],
                                ]);
                                ?>
                            </div>
                            <div class="col-md-2">  
                                <?=   $form->field($model, 'Outskirt')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Mstgroupcode::find()-> where (['GroupCodeName' => CONSTANT::$gSTATUS ])-> all(),'Code','CodedDesc'),
                                'theme' => Select2::THEME_CLASSIC,
                                'language' => 'en',
                                'options' => ['placeholder' => 'Outskirt...'],
                                'pluginOptions' => [
                                'allowClear' => true   ],
                                ]);
                                ?>
                            </div> 
                              <div class="col-md-2">  
                                <?=   $form->field($model, 'CustOutskirt')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Mstgroupcode::find()-> where (['GroupCodeName' => CONSTANT::$gSTATUS ])-> all(),'Code','CodedDesc'),
                                'theme' => Select2::THEME_CLASSIC,
                                'language' => 'en',
                                'options' => ['placeholder' => 'CustOutskirt...'],
                                'pluginOptions' => [
                                'allowClear' => true   ],
                                ]);
                                ?>
                            </div> 
                            <div class="col-md-4">  <?= $form->field($model, 'EmailId')->textInput(['maxlength' => 50, 'placeholder'=>'50 AN']) ?>   </div>
			    <div class="col-md-8">  <?= $form->field($model, 'Remark')->textInput(['maxlength' => 50 ,'placeholder'=>'50 AN']) ?>   </div>
                             <div class="col-md-2">  
                                <?=   $form->field($model, 'LocStatus')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Mstgroupcode::find()-> where (['GroupCodeName' => CONSTANT::$gSTATUS ])-> all(),'Code','CodedDesc'),
                                'theme' => Select2::THEME_CLASSIC,
                                'language' => 'en',
                                'options' => ['placeholder' => 'Status...'],
                                'pluginOptions' => [
                                'allowClear' => true   ],
                                ]);
                                ?>
                            </div>
            </div>
              <!-- /.form group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (left) -->
        <div class="col-md-6">
          <div class="box box-primary">
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
                            <div class="col-md-3">  <?= $form->field($model, 'ContactPerson')->textInput(['maxlength' => 50 ,'placeholder'=>'50 AN']) ?>   </div>
		            <div class="col-md-2">  <?= $form->field($model, 'PhoneNo1')->textInput(['maxlength' => 10,'placeholder'=>'10 Digit']) ?>  </div>
                            <div class="col-md-2">  <?= $form->field($model, 'PhoneNo2')->textInput(['maxlength' => 10,'placeholder'=>'10 Digit']) ?>  </div>
                            <div class="col-md-2">  <?= $form->field($model, 'MobileNo')->textInput(['maxlength' =>10,'placeholder'=>'10 Digit']) ?>     </div> 
                            <div class="col-md-2">  <?= $form->field($model, 'FaxNo')->textInput(['maxlength' => 10,'placeholder'=>'10 Digit']) ?>     </div> 
                            <div class="col-md-4">  <?= $form->field($model, 'Address1')->textInput(['maxlength' => 50, 'placeholder'=>'50 AN']) ?>   </div>
		            <div class="col-md-3">  <?= $form->field($model, 'Address2')->textInput(['maxlength' => 50, 'placeholder'=>'50 AN']) ?>  </div>
                           <div class="col-md-3">  
                                <?=   $form->field($model, 'Address3')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Mstcountrycode::find()-> all(),'CountryCode' ,'CountryName'),
                                'theme' => Select2::THEME_CLASSIC,
                                'language' => 'en',
                                'options' => ['placeholder' => 'Select a Country ...'],
                                'pluginOptions' => [
                                'allowClear' => true   ],
                                ]);
                                ?>
                            </div>
                            <div class="col-md-2">  <?= $form->field($model, 'PostalCode')->textInput(['maxlength' => 10,'placeholder'=>'10 AN']) ?>   </div>
		           	
		           
                           
              </div>
              
            </div>
              <div class="box-footer">
                    <div class= "allign_center">
                          
                            <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'button' : 'button'])  ?> </div>
                            <div class="col-md-3">   <p class="errormsg" ><b> Please Enter Required Field </b> </p> </div>
                            <div class="col-md-6"> <p class="infomsg" > <b> AN : Alpha Numeric; Char : Character </b> </p> </div>
                    </div>
          </div>
        </div>
        
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->
    
   

   
    <?php ActiveForm::end(); ?>

</div>


<div class="mstEmployee-index">
<?php
    $dataProvider = new ActiveDataProvider([
        'query' => app\models\Mstlocation::find(),
        'pagination' => [
            'pageSize' => 5,
        ],
    ]);
?>
<?php  
   $searchModel = New app\models\MstlocationSearch(); 
   $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
   ?>
   


    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          // 'TableId',
            'LocCode',
            'LocName',
            //'LocSecondName',
           // 'LocType',
             [
                'attribute'=>'LocType',
                'value'=>'locationtype.CodedDesc',
            ],
             [
                'attribute'=>'LocGroup',
                'value'=>'locationgroup.CodedDesc',
            ],
            'Outskirt',
            'CustOutskirt',
            'ContactPerson',
            'PhoneNo1',
            'PhoneNo2',
            'MobileNo',
            //'FaxNo',
            'EmailId:email',
            'Address1',
            //'Address2',
            //'Address3',
            //'PostalCode',
            'LocStatus',
            //'Remark',
            //'CBy',
            //'CDate',
            //'MBy',
            //'MDate',
            //'Status',

            ['class' => 'yii\grid\ActionColumn',
                'contentOptions'=>['style'=>'width:50px'],
                
                ],
        ],
    ]); ?>

</div>
    
    
 

