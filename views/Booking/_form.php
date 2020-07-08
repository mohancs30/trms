<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Mstvehicle;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use app\models\Mstcompany;
use app\base\Model;
use yii\web\Response;
use app\models\Booking;
use app\models\Mstcustomer;
use app\models\Bookinggroups;
use app\models\Mstgroupcode;   
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use yii\helpers\CONSTANT;
use wbraganca\dynamicform\DynamicFormWidget;
use Symfony\Component\DomCrawler\Crawler;
/* @var $this yii\web\View */
/* @var $model app\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>
	   <?php $form = ActiveForm::begin(['id' => 'dynamic-form','action' => 'index.php?r=booking/createbooking']); ?>
		<?php $modelvehicle = new Mstvehicle(); ?>
		<?php $modelvehicle1 = new Mstvehicle(); ?>
		<?php $modelbgroups = new Bookinggroups ?>
		<?php $modelcustomer = new Mstcustomer ?>
		<?php $modelbookinggroups = [new Bookinggroups] ?>

		<?php $model1 =new Booking(); ?>
		 
		<?php DynamicFormWidget::begin([
		        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 999, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
				'model' => $modelbookinggroups[0],
				'formId' => 'dynamic-form',
				'formFields' => [
				'VehicleType',
				'groups',
				'Movetype',
				'Size',
				'type',
				'Qty',
				'From_date',
				'To_date',
				'remarks',
        ],
    ]); ?>
	<div class="card">
    <div class="card-body">
	<div class="panel panel-default">
		<div class="panel-heading">
		<h3>Step 1</h3>
		 <?php foreach ($modelbookinggroups as $index => $modelbookinggroups): ?>
		 <?php if (!$modelbookinggroups->isNewRecord) {
             echo Html::activeHiddenInput($modelbookinggroups, '[{$index}]id');
            }
		?>
						
		</div>
		<div class="panel-body">
			<?php echo   $form->field($model,'B_id',['options' => ['value'=> ''] ])->hiddenInput()->label(false); ?>
			<div class="col-sm-2">
			<?=$form->field($modelbookinggroups, "[{$index}]Customer_id")->widget(Select2::classname(), [
				'data' =>ArrayHelper::map(Mstcustomer::find('customer_name')->all(),'customer_name','customer_name'), 
				'theme' => Select2::THEME_CLASSIC,
				'language' => 'en',
				'options' => ['placeholder' => 'customer','class'=>'	customer_name'],
				'pluginOptions' =>[
				'allowClear' => true],
				])->label('customer_name'); 
			?>
									
									
			</div>
				
                    <div class="col-sm-3">
                              <?php echo  $form->field ( $modelbookinggroups ,"[{$index}]From_date")->widget ( DatePicker::className () , [
							'options' => [ 'placeholder' => 'Select date ...' ] ,
							'pluginOptions' => [
							   'format' => 'dd-mm-yyyy' ,
							   'autoclose' => true,
							   'startDate' => date("yyyy-MM-dd H:i:s"),
							    'options' => ['class' => 'form-control picker'],
							   'todayHighlight' => true
							]
						    ] )->label ( 'Leasing From' );
					?>
                    </div>
					<div class="col-sm-3">
							<?php echo  $form->field ( $modelbookinggroups ,"[{$index}]To_date")->widget ( DatePicker::className () , [
							'options' => [ 'placeholder' => 'Select date ...' ] ,
							'pluginOptions' => [
							   'format' => 'dd-mm-yyyy' ,
							   'autoclose' => true,
							    'startDate' => date("yyyy-MM-dd H:i:s"),
								 'options' => ['class' => 'form-control picker'],
							   'todayHighlight' => true
							]
						] )->label ( 'Leasing To' );
					?>
					</div>
					
					<div class="col-sm-3">
						<?= $form->field($modelbookinggroups,"[{$index}]remarks")->textInput()->label("Remarks") ?>
					</div>
				
		</div>
	</div>
		
    <div class="panel-body container-items"><!-- widgetContainer -->
			<div class="pull-right">
		     <button type="button" class="add-item btn btn-success"><i class="glyphicon glyphicon-plus"></i></button>
			 </div>
			 <br>
           
                <div class="item panel panel-default"><!-- widgetBody -->
				  
                   <div class="panel-heading">
                        <h3 class="panel-title pull-left">Prime Mover</h3>
                        <div class="pull-right">
                     
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
					 	<div class='row'>
						
								
							
					    <div class="col-sm-2 col-md-2">
                                <?=$form->field($modelbookinggroups, "[{$index}]size")->widget(Select2::classname(), [
										'theme' => Select2::THEME_CLASSIC,
										'language' => 'en',
										'options' => ['placeholder' => 'Size ...','class'=>'size'],
										'pluginOptions' => [
										'allowClear' => true   ],
										])->label('Size'); 
									?>
                        </div>
						
							
						<div class="col-sm-2">
						<label>Weight</label>
						<?= Html::input('number','ladenweight','', $options=['class'=>'form-control','maxlength'=>10]) ?>

						</div>
							
					
							<div class="col-sm-2">
                               <?=$form->field($modelbookinggroups,"[{$index}]avl_qty", [
										'options' => [
										'tag' => 'div',
										'class' => '',
										'value'=>'',
										],
									   ])->textInput([
									   'type' => 'text',
								   
									])->label('Available Qty')?>
                            </div>
							<div class="col-sm-2">
                               <?=$form->field($modelbookinggroups,"[{$index}]req_qty", [
										'options' => [
										'tag' => 'div',
										'class' => '',
										'value'=>'',
										],
									   ])->textInput([
									   'type' => 'text',
								   
									])->label('Qty')?>
                            </div>
							<div class="col-sm-2">
                              <?php echo  $form->field ( $modelbookinggroups ,"[{$index}]Arrival_date")->widget ( DatePicker::className () , [
							'options' => [ 'placeholder' => 'Select date ...' ] ,
							'pluginOptions' => [
							   'format' => 'dd-mm-yyyy' ,
							   'autoclose' => true,
							   'startDate' => date("yyyy-MM-dd H:i:s"),
							    'options' => ['class' => 'form-control picker'],
							   'todayHighlight' => true
							]
						    ] )->label ( 'Collection Date' );
								?>
							</div>
									
						<div class="col-sm-2">
                            <?php echo   $form->field($modelbookinggroups, "[{$index}]Arrival_time")->widget(TimePicker::classname(), [
							'options' => [ 'placeholder' => 'Select date ...' ] ,
							'pluginOptions' => [
							   'format' => 'dd-mm-yyyy' ,
							   'autoclose' => true,
							   'todayHighlight' => true
							]
						])->label ( 'Collection time' );				
						?>	
                    </div>
					</div> 
                    </div><!-- end:panel -->

                </div><!-- end:row -->
              
	<!----Trailer---->
	    <div class="panel-body container-items"><!-- widgetContainer -->
				<div class="pull-right">
		     <button type="button" class="add-item btn btn-success"><i class="glyphicon glyphicon-plus"></i></button>
			 </div>
			 <br>
           
                <div class="item panel panel-default"><!-- widgetBody -->
				  
                   <div class="panel-heading">
                        <h3 class="panel-title pull-left">Trailer</h3>
                        <div class="pull-right">
                     
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
					  <div class="row">
                       
						</div>
						<div class='row'>
					
							
                        <div class="col-sm-2 col-md-2">
                                <?=$form->field($modelbgroups, "[{$index}]size")->widget(Select2::classname(), [
										'theme' => Select2::THEME_CLASSIC,
										'language' => 'en',
										'options' => ['placeholder' => 'Size ...','class'=>'trsize'],
										'pluginOptions' => [
										'allowClear' => true   ],
										])->label('Size'); 
									?>
                        </div>
						
						   <div class="col-sm-2 col-md-2">
                                <?=$form->field($modelbgroups, "[{$index}]movetype")->widget(Select2::classname(), [
										'theme' => Select2::THEME_CLASSIC,
										'language' => 'en',
										'options' => ['placeholder' => 'Size ...','class'=>'type'],
										'pluginOptions' => [
										'allowClear' => true   ],
										])->label('Type'); 
									?>
                        </div>
						<div class="col-sm-2">
						<label>Weight</label>
						<?= Html::input('number','ladenweight','', $options=['class'=>'form-control','maxlength'=>10]) ?>

						</div>
							
					
							<div class="col-sm-2">
                               <?=$form->field($modelbookinggroups,"[{$index}]avl_qty", [
										'options' => [
										'tag' => 'div',
										'class' => '',
										'value'=>'',
										],
									   ])->textInput([
									   'type' => 'text',
								   
									])->label('Available Qty')?>
                            </div>
							<div class="col-sm-2">
                               <?=$form->field($modelbookinggroups,"[{$index}]req_qty", [
										'options' => [
										'tag' => 'div',
										'class' => '',
										'value'=>'',
										],
									   ])->textInput([
									   'type' => 'text',
								   
									])->label('Qty')?>
                            </div>
							<div class="col-sm-2">
                              <?php echo  $form->field ( $modelbookinggroups ,"[{$index}]Arrival_date")->widget ( DatePicker::className () , [
							'options' => [ 'placeholder' => 'Select date ...' ] ,
							'pluginOptions' => [
							   'format' => 'dd-mm-yyyy' ,
							   'autoclose' => true,
							   'startDate' => date("yyyy-MM-dd H:i:s"),
							    'options' => ['class' => 'form-control picker'],
							   'todayHighlight' => true
							]
						    ] )->label ( 'Collection Date' );
								?>
							</div>
									
			        <div class="col-sm-2">
                                <?php echo   $form->field($modelbookinggroups, "[{$index}]Arrival_time")->widget(TimePicker::classname(), [
							'options' => [ 'placeholder' => 'Select date ...' ] ,
							'pluginOptions' => [
							   'format' => 'dd-mm-yyyy' ,
							   'autoclose' => true,
							   'todayHighlight' => true
							]
						])->label ( 'Collection time' );				
						?>	
                    </div>
					</div> 
							

                </div><!-- end:row -->
                </div>
  
	<!----Trailer End--->
	
	
		<!----Parking---->
	
	    <div class="panel-body container-items"><!-- widgetContainer -->
			<div class="pull-right">
		     <button type="button" class="add-item btn btn-success"><i class="glyphicon glyphicon-plus"></i></button>
			 </div>
			 <br>
            <div class="item panel panel-default"><!-- widgetBody -->
			<div class="panel-heading">
                        <h3 class="panel-title pull-left">Parking</h3>
                        <div class="pull-right">
							<button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
					  <div class="row">
                       
						</div>
						<div class='row'>
												
						<div class="col-sm-2 col-md-2">
							
                                 <?=  
								$form->field($modelbookinggroups, "[{$index}]vehicletype")->widget(Select2::classname(), [
								'data' => ['PM' => 'Prime Mover', 'TR' => 'Trailer'],
								'theme' => Select2::THEME_CLASSIC,
								'language' => 'en',
								'options' => ['placeholder' => 'Move type...','class'=>'vtype'],
								'pluginOptions' => [
								'allowClear' => true ],
								])->label('VehicleType');
								?>
                        </div>
						<div class="col-sm-2 col-md-2">
                                <?=$form->field($modelbookinggroups, "[{$index}]size")->widget(Select2::classname(), [
										'theme' => Select2::THEME_CLASSIC,
										'language' => 'en',
										'options' => ['placeholder' => 'Size ...','class'=>'size'],
										'pluginOptions' => [
										'allowClear' => true   ],
										])->label('Size'); 
									?>
                        </div>
						<div class="col-sm-2 col-md-2">
                                 <?=  
								$form->field($modelbookinggroups, "[{$index}]parking_loc")->widget(Select2::classname(), [
								'data' => ['YardHQ' => 'YardHQ', 'Yard1' => 'Yard1','Yard2' => 'Yard2','Yard3' => 'Yard3'],
								'theme' => Select2::THEME_CLASSIC,
								'language' => 'en',
								'options' => ['placeholder' => 'Parking Loc...','class'=>'pakloc'],
								'pluginOptions' => [
								'allowClear' => true ],
								])->label('Pakking Loction');
								?>
                         </div>
						</div>
					<div class='row'>
						<div class="col-sm-2">
							 <label>Weight</label>
								<input type='text' id='lweight'>
								
						</div>
						<div class="col-sm-2">
                               <?=$form->field($modelbookinggroups,"[{$index}]avl_qty", [
										'options' => [
										'tag' => 'div',
										'class' => '',
										'value'=>'',
										],
									   ])->textInput([
									   'type' => 'text',
								   
									])->label('Available Qty')?>
                            </div 
							<div class="col-sm-2">
                               <?=$form->field($modelbookinggroups,"[{$index}]req_qty", [
										'options' => [
										'tag' => 'div',
										'class' => '',
										'value'=>'',
										],
									   ])->textInput([
									   'type' => 'text',
								   
									])->label('Qty')?>
                            </div>
						</div> 
                    </div><!-- end:row -->

                </div><!-- end:row -->
             </div>
   
	
	<!----Parking End--->
     <?php endforeach; ?>
	    <?php DynamicFormWidget::end(); ?>  
  </div>
  
	 <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
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
