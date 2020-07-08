<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use kartik\widgets\DateTimePicker;
use yii\data\ActiveDataProvider;
use app\models\MstvehicleSearch;
use kartik\datecontrol\DateControl;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Mstvehicle;
use app\models\Mstlocation;
use app\models\Servicecontract;
use app\models\Mstgroupcode;
use kartik\select2\Select2;
use yii\bootstrap4\Modal;
use yii\helpers\CONSTANT;
use app\models\Mstcompany;
use wbraganca\dynamicform\DynamicFormWidget;
use Symfony\Component\DomCrawler\Crawler;
use app\base\Model;
use yii\web\Response;

//use kartik\icons\FontAwesomeAsset;
//FontAwesomeAsset::register($this);
//use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Mstvehicle */
/* @var $form yii\widgets\ActiveForm */
?>
<head>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<div class="mstvehicle-form">


   <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

	<div class="row">

		<div class="col-xl-12 col-md-12">
			<div class="card">
				<div class="card-header  bg-primary">
					<h3 class="card-title text-white mb-0">Vehicle Details</h3>
				</div>
				<div class="card-body">

					<div class="form-group">
						<div class="row">
						
						<div class="col-md-2 col-sm-2">  
								 <?=   $form->field($model, 'VehicleType')->widget(Select2::classname(), [
								'data' =>ArrayHelper::map(Mstgroupcode::find()-> where (['GroupCodeName' => CONSTANT::$gVEHICLETYPE])->all(),'Code','CodedDesc'), 
								'theme' => Select2::THEME_CLASSIC,
								'language' => 'en',
								'options' => ['placeholder' => 'Vehicle Type...'],
								'pluginOptions' => [
								'allowClear' => true   ],
								]);
								?>
						</div>
							
						<div class="col-md-2 col-sm-2 redcolor">  <?= $form->field($model, 'VehicleRegNo')->textInput(['maxlength' => true,'placeholder'=>'15 AlphaNumeric']) ?></div>
						
						
						  <div class="col-sm-2 col-md-2">
                                <?=$form->field($model, 'Size')->widget(Select2::classname(), [
										'theme' => Select2::THEME_CLASSIC,
										'language' => 'en',
										'options' => ['placeholder' => 'Size ...','class'=>'size'],
										'pluginOptions' => [
										'allowClear' => true   ],
										])->label('Size'); 
									?>
                            </div>
							
						
							
                            <div class="col-md-2 col-sm-2 redcolor">  
							<?=   $form->field($model, 'VehicleDesc')->widget(Select2::classname(), [
							'data' =>ArrayHelper::map(Mstgroupcode::find()-> where (['GroupCodeName' => CONSTANT::$gVEHICLEDESC])->all(),'Code','CodedDesc'), 
							'theme' => Select2::THEME_CLASSIC,
							'language' => 'en',
							'options' => ['placeholder' => 'Vehicle Description ...'],
							'pluginOptions' => [
							'allowClear' => true   ],
							])->label('Type');
							?>
							</div>
							
							
							<div class="col-md-2 col-sm-2">  
								<?= $form ->field($model,'CompCode')->widget(Select2::classname(), [
								'data' => ArrayHelper::map(Mstcompany::find()->asArray()->all(),'CompCode',
								function($model, $defaultValue) 
									{
									 return $model['CompCode'].'-'.$model['CompName1'];
									}
										),
											'theme' => Select2::THEME_CLASSIC,
											'language' => 'en',
											'options' => ['placeholder' => 'Select a Company ...'],
											'pluginOptions' => [
											'allowClear' => true,
											'disabled'=> FALSE,
											],
										]) 
							?>
							</div>

							<div class="col-md-2 col-sm-3">   
							<?= $form->field($model, 'VehicleStatus')->widget(Select2::classname(), [
								'data' => ArrayHelper::map(Mstgroupcode::find()-> where (['GroupCodeName' => 'VehicleAttStatus' ])-> all(),'Code','CodedDesc'), 
								'theme' => Select2::THEME_CLASSIC,
								'language' => 'en',
								'options' => ['placeholder' => 'Select a Status ...'],
								'pluginOptions' => [
								'allowClear' => true   ],
								]); ?> 
							</div>
					

						</div>
						<div class="row">
						
							<div class="col-sm-2">
								  <?php echo  $form->field ( $model ,'Registration_date')->widget ( DatePicker::className () , [
								'options' => [ 'placeholder' => 'Select date ...' ] ,
								'pluginOptions' => [
								   'format' => 'dd-mm-yyyy' ,
								   'autoclose' => true,
								   'startDate' => date("yyyy-MM-dd H:i:s"),
									'options' => ['class' => 'form-control picker'],
								   'todayHighlight' => true
								]
								] )->label ( 'Registration Date' );
								?>
							</div>
							
							<div class="col-sm-2">
								  <?php echo  $form->field ( $model ,'Ownership_date')->widget ( DatePicker::className () , [
								'options' => [ 'placeholder' => 'Select date ...' ] ,
								'pluginOptions' => [
								   'format' => 'dd-mm-yyyy' ,
								   'autoclose' => true,
								   'startDate' => date("yyyy-MM-dd H:i:s"),
									'options' => ['class' => 'form-control picker'],
								   'todayHighlight' => true
								]
								] )->label ( 'Ownership Date' );
								?>
							</div>
							
							<div class="col-md-2 col-sm-2">  <?= $form->field($model, 'ChassisNo')->textInput(['maxlength' => true]) ?>   </div>
						
							<div class="col-md-2 col-sm-2">  <?= $form->field($model, 'VehicleEngNo')->textInput(['maxlength' => true]) ?>   </div>
							<div class="col-md-2 col-sm-2">  <?= $form->field($model, 'IUNo')->textInput(['maxlength' => true]) ?>   </div>
							</div>
							<div class="row">
							<div class="col-md-2 col-sm-3">  <?= $form->field($model, 'LoadingCapacity')->textInput(['maxlength' => true]) ?>   </div>
							<div class="col-md-2 col-sm-2">   <?= $form->field($model, 'LadenWight')->textInput(['maxlength' => true]) ?>  </div>     
							<div class="col-md-2 col-sm-2">   <?= $form->field($model, 'UnLadenWight')->textInput(['maxlength' => true]) ?> </div>
							<div class="col-md-2 col-sm-2">  <?= $form->field($model, 'BrandName')->textInput(['maxlength' => true]) ?>   </div>
							<div class="col-md-2 col-sm-3">   <?= $form->field($model, 'YearOfMFG')->textInput(['maxlength' => true]) ?> 	</div>
							</div>
						<div class="row">
						
							<div class="col-md-2 col-sm-3">   <?= $form->field($model, 'MakeModel')->textInput(['maxlength' => true]) ?>  </div> 
							<div class="col-md-2 col-sm-3">   <?= $form->field($model, 'Remark')->textInput(['maxlength' => true]) ?>  </div> 
							<?php // $form->field($model, 'ChesisNo')->textInput(['maxlength' => true]) ?>  
						<div class="col-md-2 col-sm-3">  <?= $form->field($model, 'VehicleCondition')->textInput(['maxlength' => true]) ?>  </div> 
						<div class="col-md-2 col-sm-3">  <?= $form->field($model, 'Remark')->textInput(['maxlength' => true]) ?>   </div>              
							
						</div>

					</div>
				</div>
			</div>

		</div>		

				<!----service contract details--->
		<div class="col-xl-12 col-md-12">
		
	
			<div class="card">
				<div class="card-header  bg-primary">
					<h3 class="card-title text-white mb-0">Service  Details</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<?php $modelservice = new Servicecontract(); ?>
						<div class="col-md-2 col-sm-2">  
								<?= $form->field($modelservice,'company_name')->widget(Select2::classname(), [
								'data' => ArrayHelper::map(Servicecontract::find()->where(['status' => 'A'])->all(),'company_name','company_name'), 
								'theme' => Select2::THEME_CLASSIC,
								'language' => 'en',
								'options' => ['placeholder' => 'Select a Status ...'],
								'pluginOptions' => [
								'allowClear' => true   ],
								]); ?> 
						</div>
						
					<div class="col-md-2 col-sm-2">  <?= $form->field($model, 'contract_ref_no')->textInput(['maxlength' => true])->label ('contract_ref_no' ) ?>   </div>	
					<div class="col-md-2 col-sm-2">
						 <?php echo  $form->field ( $model ,"contract_date" )->widget(DatePicker::className (),[
						'options' => [ 'placeholder' => 'Select date ...' ] ,
						'pluginOptions' => [
						   'format' => 'dd-mm-yyyy' ,
						   'autoclose' => true,
						   'startDate' => date("yyyy-MM-dd H:i:s"),
							'options' => ['class' => 'form-control picker'],
						   'todayHighlight' => true
						]
						] )->label ( 'Contract date' );
					?>
					</div>
				
					<div class="col-md-2 col-sm-2">  <?= $form->field($model, 'workshop_address1')->textInput(['maxlength' => true])->label ('workshop_address') ?>   </div>
					<div class="col-md-2 col-sm-2">  <?= $form->field($model, 'c_contactno')->textInput(['maxlength' => true])->label ('workshop Contact No' )?></div>
										
					</div>
				</div>
			</div>
		</div>	
	
		<!---Service Contract End-->
		
		<div class="col-xl-12 col-md-12">
		<div class="card">
			<div class="card-header  bg-primary">
				<h3 class="card-title text-white mb-0">Due Date Details</h3>
			</div>
			<div class="card-body">
			<?php $model1 = [new mstvehicle] ?>
			<?php if (empty($planDetailModels)) {
						$model1 = [new mstvehicle()];
			}?>
			<?php DynamicFormWidget::begin([
		        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 999, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
				'model' => $model1[0],
				'formId' => 'dynamic-form',
				'formFields' => [
				'ValidFrom',
				'ValidTo',
				'Priornotification',
				'notify_email',
			
				],
			]);
		?>
		    <?php foreach ($model1 as $index => $model1): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
				  	<div class="pull-right">
		     <button type="button" class="add-item btn btn-success"><i class="glyphicon glyphicon-plus"></i></button>
			 </div>
			 <br>
             <div class="panel-heading">
                 <div class="pull-right">
                     <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                  </div>
					<div class="clearfix"></div>
             </div>
             <div class="panel-body">
				<div class="row">
                        <?php
                            // necessary for update action.
                            if (!$model->isNewRecord) {
                                echo Html::activeHiddenInput($model1,"[{$index}]id");
                            }
                        ?>
				</div>
				<div class='row'>
							
					<div class="col-sm-2 col-md-2">
							 <?=  
							$form->field($model1, "[{$index}]ValidFrom")->widget(Select2::classname(), [
							'data' => ['Permit' => 'Permit', 'Road Tax' => 'Road Tax','Insurance'=>'Insurance','Vpc'=>'Vpc','ROB'=>'ROB'],
							'theme' => Select2::THEME_CLASSIC,
							'language' => 'en',
							'options' => ['placeholder' => 'Select...','class'=>'duetype'],
							'pluginOptions' => [
							'allowClear' => true ],
							])->label('Type');
							?>
					</div>
					
					<div class="col-md-2 col-sm-2">  <?= $form->field($model, 'validity')->textInput(['maxlength' => true])->label ('validity') ?>   </div>
					<div class="col-md-2 col-sm-2">
				
						<?php
							echo '<label class="control-label">Valid From </label>';
							echo DatePicker::widget([
							'name' => "[{$index}]Validfrom", 
							'options' => ['placeholder' => 'Valid From...'],
							'pluginOptions' => [
							'format' => 'dd-M-yyyy',
							'todayHighlight' => true
							]
						]);
						?>
					</div>
					
					<div class="col-md-2 col-sm-2">
					
						<?php 
						echo '<label class="control-label">Valid To </label>';
						echo  DatePicker::widget([
							 'name' => "[{$index}]validto", 
							 'options' => ['placeholder' => 'Valid To ...'],
							 'pluginOptions' => [
								'format' => 'dd-M-yyyy',
								'todayHighlight' => true
							]
						]);
						?>
					</div>
					
					
					<div class="col-sm-2 col-md-2">
                                 <?=  
								$form->field($model, "[{$index}]Priornotification")->widget(Select2::classname(), [
								'data' => ['1' => '1month', '3' => '3months','6' => '6months'],
								'theme' => Select2::THEME_CLASSIC,
								'language' => 'en',
								'options' => ['placeholder' => 'Prior notification','class'=>'Priornotification'],
								'pluginOptions' => [
								'allowClear' => true ],
								])->label('Prior notification');
								?>
                    </div>
			
					<div class="col-md-2 col-sm-2">  <?= $form->field($model, 'notify_email')->input('email')->label ('Notify Email' )?></div>
								
					</div>
					 
                    </div><!-- end:row -->

                </div><!-- end:row -->
				<?php endforeach; ?>
	
	
						
				</div><!-- /.Row 1 -->
					
				<?php DynamicFormWidget::end(); ?>  

					<div class="box-footer">
					<div class= "allign_center"> <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'button']) ?>  </div>
					<div class="col-md-3">   <p class="errormsg" ><b> Please Enter Required Field </b> </p> </div>
					<div class="col-md-6"> <p class="infomsg" > <b> AN : Alpha Numeric; Char : Character </b> </p> </div>
					<!--   Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about	 
					the plugin. -->
					</div>
				</div>	
			</div>
		</div>
		
		</div>

	
<?php ActiveForm::end(); ?>

<?php $js = '
		
$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
 window.initSelect2Loading = function(id, optVar){
	initS2Loading(id, optVar)
};
window.initSelect2DropStyle = function(id, kvClose, ev){
	initS2Change($("#"+id));
	
	
}});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
   var hasDateControl = $(this).find("[data-krajee-datecontrol]");
        if (hasDateControl.length > 0) {
            hasDateControl.each(function() {
                var id = $(this).attr("id");
                var dcElementOptions = eval($(this).attr("data-krajee-datecontrol"));
                if (id.indexOf(dcElementOptions.idSave) < 0) {
                    // initialize the NEW DateControl element
                    var cdNewOptions = $.extend(true, {}, dcElementOptions);
                    cdNewOptions.idSave = $(this).next().attr("id");
                    $(this).kvDatepicker(eval($(this).attr("data-krajee-kvdatepicker")));
                    $(this).removeAttr("value name data-krajee-datecontrol");
                    $(this).datecontrol(cdNewOptions);

                }
            });
        }		
	   

});

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {
    console.log("Deleted item!");
});

$(".dynamicform_wrapper").on("limitReached", function(e, item) {
    alert("Limit reached");
});
';
$this->registerJs($js);
?>