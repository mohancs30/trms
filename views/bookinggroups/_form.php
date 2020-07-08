<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Mstvehicle;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use app\models\Mstcompany;
use app\models\Booking;
use app\models\Bookinggroups;
use app\models\Mstgroupcode;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use yii\helpers\CONSTANT;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>
<head>
<link rel="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>


<div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> Address Book
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add address</button>
            <div class="clearfix"></div>
        </div>
		<?php $form = ActiveForm::begin();?>
		<?php $modelvehicle =new Mstvehicle(); ?>
		<?php $modelvehicle1 =new Mstvehicle(); ?>
		<?php $modelbookinggroups = [new Bookinggroups] ?>
		<?php $model1 =new Booking(); ?>

		 <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
		'min' => 1, // 0 or 1 (default 1)
		'insertButton' => '.add-item', // css class
		'deleteButton' => '.remove-item', // css class
		'model' => $modelbookinggroups[0],
		'formId' => 'dynamic-form',
		'formFields' => [
		'size',
		'groups',
		'movetype',
		'Size',
		'vehicletype',
		'req_qty',
		'Fromdate',
		'Todate',
		'Remarks',
        ],
    ]); ?>

        <div class="panel-body container-items"><!-- widgetContainer -->
		
		<?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
            <?php foreach ($modelbookinggroups as $index => $modelbookinggroups): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-address">Address: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$modelbookinggroups->isNewRecord) {
                                echo Html::activeHiddenInput($modelbookinggroups, '[{$index}]id');
                            }
							?>
                      
							<?=  
								$form->field($modelbookinggroups,'[{$index}]VehicleType')->widget(Select2::classname(), [
								'data' => ['PM' => 'Prime Mover', 'TR' => 'trailer'],
								'theme' => Select2::THEME_CLASSIC,
								'language' => 'en',
								'options' => ['placeholder' => 'Vehicle...'],
								'pluginOptions' => [
								'allowClear' => true ],
								])->label(false);
							?>
								
                        <div class="row">
                            <div class="col-sm-6">
                            <?=  
								$form->field($modelbookinggroups, '[{$index}]movetype')->widget(Select2::classname(), [
								'data' => ['collection' => 'collection', 'return' => 'return'],
								'theme' => Select2::THEME_CLASSIC,
								'language' => 'en',
								'options' => ['placeholder' => 'Move type...'],
								'pluginOptions' => [
								'allowClear' => true ],
								])->label(false);
							?>
                            </div>
                            <div class="col-sm-6">
                                <?=$form->field($modelbookinggroups, '[{$index}]size')->widget(Select2::classname(), [
										'data' =>ArrayHelper::map(Mstvehicle::find()-> where (['VehicleType'=>'TR'])->all(),'Size','Size'), 
										'theme' => Select2::THEME_CLASSIC,
										'language' => 'en',
										'options' => ['placeholder' => 'Size ...'],
										'pluginOptions' => [
										'allowClear' => true   ],
										]); 
									?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <?=$form->field($modelbookinggroups, '[{$index}]type')->widget(Select2::classname(), [
										'data' =>ArrayHelper::map(Mstvehicle::find()->where (['VehicleType'=>'TR'])->all(),'VehicleDesc','VehicleDesc'), 
										'theme' => Select2::THEME_CLASSIC,
										'language' => 'en',
										'options' => ['placeholder' => 'Type ...'],
										'pluginOptions' => [
										'allowClear' => true   ],
										]); 
									?>
                            </div>
                            <div class="col-sm-6">
                               <?=$form->field($modelbookinggroups,'[{$index}]Qty', [
										'options' => [
										'tag' => 'div',
										'class' => '',
										'value'=>'',
										],
									   'template' => '<span class="col-md-8 col-lg-8">{input}{error}</span>'
										])->textInput([
									   'type' => 'text',
								   
									])->label(false)?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <?php echo   $form->field($modelbookinggroups, '[{$index}]Arrivaltime')->widget(TimePicker::classname(), [
							'options' => [ 'placeholder' => 'Select date ...' ] ,
							'pluginOptions' => [
							   'format' => 'dd-mm-yyyy' ,
							   'autoclose' => true,
							   'todayHighlight' => true
							]
						])->label ( 'Arrival time' );				
						?>	
                            </div>
                            <div class="col-sm-6">
                              <?php echo  $form->field ( $modelbookinggroups , '[{$index}]Fromdate' )->widget ( DatePicker::className () , [
							'options' => [ 'placeholder' => 'Select date ...' ] ,
							'pluginOptions' => [
							   'format' => 'dd-mm-yyyy' ,
							   'autoclose' => true,
							   'startDate' => date("yyyy-MM-dd H:i:s"),
							   'todayHighlight' => true
							]
						] )->label ( 'Leasing From' );
					?>
                            </div>
							    <div class="col-sm-6">
							<?php echo  $form->field ( $modelbookinggroups , '[{$index}]Todate' )->widget ( DatePicker::className () , [
							'options' => [ 'placeholder' => 'Select date ...' ] ,
							'pluginOptions' => [
							   'format' => 'dd-mm-yyyy' ,
							   'autoclose' => true,
							    'startDate' => date("yyyy-MM-dd H:i:s"),
							   'todayHighlight' => true
							]
						] )->label ( 'Leasing To' );
					?>
					</div>
					
							    <div class="col-sm-6">
								<?= $form->field($modelbookinggroups, '[{$index}]Remarks')->textInput()->label('Remarks') ?>
								</div>
							
                        </div><!-- end:row -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php DynamicFormWidget::end(); ?>  

    <div class="form-group">
        <?= Html::submitButton($modelbookinggroups->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>
  
<?php $js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>