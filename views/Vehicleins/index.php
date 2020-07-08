<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveField;
use yii\data\ActiveDataProvider;
use kartik\select2\Select2;
use app\models\Bookinggroups;
use app\models\Booking;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Vehicleins;
use yii\db\ActiveRecord;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VechicleinsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
 use yii\bootstrap\Modal;
use yii\widgets\Pjax;
$this->params['breadcrumbs'][] = $this->title;
?>
<head>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
</head>
<div class="vechicleins-index">
	<?php $modelbookinggroups = new Bookinggroups ?>
	<?php $modelbooking = new Booking ?>
	<?php $modelbookinggroups1 = new Bookinggroups ?>
	<?php $modelbookinggroups2 = new Bookinggroups ?>
	<?php $model = new Vehicleins ?>
	<?php $model1 = new Vehicleins ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

 
	<div class="vehicleins-form">
  	<div class="row">
	<div class="col-xl-12">
	<div class="card">
    <div class="card-body">
	<h4 class="header-title mb-4">Vehicle Inspection</h4>
		<div class="span12">
			
         <div id="tab" class="btn-group" data-toggle="buttons-radio">
			<a href="#tr" type="button"  class="btn btn-primary active"   data-toggle="tab">Trailer</a>
            <a href="#pm" type="button"  class="btn btn-primary"  data-toggle="tab">Prime Mover</a>
            <a href="#facilities"  type="button"  class="btn btn-primary" data-toggle="tab">Facilities</a>
                 
		</div>
						
		<div class="tab-content">
		
		    <div class="tab-pane active" id="tr">
			<!-- Modal Trailer -->
				
				<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
		<div class="modal-content">
		
	   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'id' => 'trailer-form']]) ?>
	   
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					  </div>
					  <div class="modal-body">
					<table class="table table-bordered">
					  <thead>
						<tr>
						  
						  <th scope="col">List</th>
						  <th scope="col"> Condition</th>
						
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <th scope="row">skeleton</th> 
						  
						 <td><?php  $model['T_frame'] = 'Good'; ?>
						  <?=$form->field($model, 'T_frame')->radioList(['Good' => 'Good',   'Not Good' => 'Not Good'])->label(false)?>
						  </td>
						 
						</tr>
						
						<tr>
						  <th>King Pin</th>
							<td><?php $model['T_kingpin'] = 'Good'; ?>
							<?= $form->field($model, 'T_kingpin')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?></td>						  
						</tr>
						<tr>
						   <th>Landing Gear</th> 
						   <td>
						   <?php  $model['T_landing_Gear'] = 'Good'; ?>
							<?=  $form->field($model, 'T_landing_Gear')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?>
							</td>
						</tr>
						<tr>
							<th>Landing Gear - Glider & Lever</th>
							<td><?php  $model['T_LG_GandL'] = 'Good'; ?>
							<?=  $form->field($model, 'T_LG_GandL')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?></td>
						</tr>
						<tr>
							<th>landing Gear - Stand Shoes</th><td>
							<?php  $model['T_LG_shoes'] = 'Good'; ?>
							<?=  $form->field($model, 'T_LG_shoes')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false) ?>
						</td>
						</tr>						  	
						<tr><th>Torque Bar</th><td><?php  $model['T_Bar'] = 'Good'; ?>
							<?=  $form->field($model, 'T_Bar')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good']) ->label(false)?></td></tr>
						  	<tr>
							<th>U/Bolt</th> <td><?php  $model->U_Bolt = 'Good'; ?>
							<?=  $form->field($model, 'U_Bolt')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?></td></tr>
						  	<tr><th>Twist locks - front</th>  <td><?php  $model->Twist_lock_front = 'Condition'; ?>
							<?=  $form->field($model, 'Twist_lock_front')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?></td></tr>
						  	<tr><th>Twist locks - center</th> <td><?php  $model->Twist_lock_center = 'Condition'; ?>
							<?=  $form->field($model, 'Twist_lock_center')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition']) ->label(false) ?>
							</td></tr>
						  	<tr><th>Twist locks - rear</th> <td><?php  $model->Twist_lock_rear = 'Condition'; ?>
							<?=  $form->field($model, 'Twist_lock_rear')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
							</td></tr>
							<tr><th>Bumper</th> <td><?php  $model->Bumper = 'Condition'; ?>
							<?=  $form->field($model, 'Bumper')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
							</td></tr> 
													<tr><th>Registration Number Plate</th> <td><?php  $model->Reg_num_palte = 'Condition'; ?>
							<?=  $form->field($model, 'Reg_num_palte')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)  ?>
							</td></tr>
							<tr><th>Under-ride guard</th> <td><?php  $model->Under_ride_guard = 'Condition'; ?>
							<?=  $form->field($model, 'Under_ride_guard')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
							</td></tr>
							<tr><th>Hazchem Panel</th> <td><?php  $model->Hazchem_Panel = 'Good'; ?>
							<?= $form->field($model,'Hazchem_Panel')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false) ?>
							</td></tr>													
							<tr><th>Air Pressure</th><td>
							<?php  $model->T_tyre_Inflation_of_Tyre = 'Good'; ?>
							<?=  $form->field($model,'T_tyre_Inflation_of_Tyre')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?>
							</td></tr>
							<tr><th>Mudguard</th> <td><?php  $model->T_tyre_mudguard = 'Condition'; ?>
							<?=  $form->field($model, 'T_tyre_mudguard')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition']) ->label(false)?>
							</td></tr>
							<tr><th>Tyres Condition Inner and Outer) - Axle 1</th>  <td><?php  $model->T_tyre_axle1 = 'Good'; ?>
							<?=  $form->field($model, 'T_tyre_axle1')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false) ?>
							</td></tr>
							<tr><th>Tyres Condition Inner and Outer) - Axle 2</th>  <td><?php  $model->T_tyre_axle2 = 'Good'; ?>
							<?=  $form->field($model, 'T_tyre_axle2')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?>
							</td></tr>
													<tr><th>Tyres Condition Inner and Outer) - Axle 3</th> <td><?php  $model->T_tyre_axle3 = 'Good'; ?>
							<?=  $form->field($model, 'T_tyre_axle3')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?></td> </tr>
							<tr><th>Rims & Nuts Condition</th> <td>		<?php  $model->Rimandnuts = 'Good'; ?>
							<?=  $form->field($model, 'Rimandnuts')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?></td> </tr>
													
							<tr><th>Suspension</th>  <td><?php  $model->Suspension = 'Condition'; ?>
							<?=  $form->field($model, 'Suspension')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])?>
							</td></tr>
							<tr><th>Visible condition of Axles</th> <td><?php  $model->Visible_condi_of_axles = 'Condition'; ?>
							<?=  $form->field($model, 'Visible_condi_of_axles')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition']) ?>
							</td> </tr>
							<tr><th>Lights_indicators</th>  <td>	<?php  $model->Lights_indicators = 'Good'; ?>
							<?=  $form->field($model,'Lights_indicators')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?>
							</td></tr>
							
							
							<tr><th>Brake Lights</th>  <td>	<?php  $model->Brake_lights = 'Good'; ?>
							<?=  $form->field($model, 'Brake_lights')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?>
							</td></tr>
							
							
							<tr><th>Front Lights</th> <td> <?php  $model->Front_lights = 'Good'; ?>
							<?=  $form->field($model, 'Front_lights')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?></td></tr>
							<tr><th>Indicators tail</th>  <td><?php  $model->Indicators_tail = 'Good'; ?>
							<?=  $form->field($model, 'Indicators_tail')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?>
							</td></tr>
							<tr><th>Number Plates and its Lights</th> <td><?php  $model->Num_plates_lights_Tr_Pm = 'Good'; ?>
							<?=  $form->field($model, 'Num_plates_lights_Tr_Pm')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false) ?>
							</td></tr>
													<tr><th>Power Cable</th>  <td><?php  $model->Power_cable = 'Good'; ?>
							<?=  $form->field($model, 'Power_cable')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?>
							</td></tr>
													<tr><th>Power Connector (male)</th> <td><?php  $model->Power_connector_male = 'Good'; ?>
							<?=  $form->field($model, 'Power_connector_male')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?>
							</td></tr>
													<tr><th>Reverse Lights (tail)</th> <td><?php  $model->Reverse_lights = 'Good'; ?>
							<?php  $form->field($model, 'Reverse_lights')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false) ?>
							</td></tr>
													<tr><th>Reverse Buzzer</th> <td><?php  $model->Reverse_buzzer = 'Good'; ?>
							<?=  $form->field($model, 'Reverse_buzzer')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?>
							</td></tr>
													<tr><th>Speed Limit Signage (tail sticker)</th> <td><?php  $model->Speed_limit_signage = 'Good'; ?>
							<?=  $form->field($model, 'Speed_limit_signage')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good']) ->label(false)?>
							</td></tr>
													<tr><th>Red Reflector (tail sticker)</th> <td><?php  $model->Red_reflector = 'Good'; ?>
							<?=  $form->field($model, 'Red_reflector')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good']) ->label(false)?>
							</td></tr>
													<tr><th>Yellow Side Reflector</th> <td><?php  $model->Yellow_side_reflector = 'Good'; ?>
							<?=  $form->field($model, 'Yellow_side_reflector')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false) ?>
							</td></tr>
													<tr><th>Brake system connectors</th> <td><?php  $model->Tr_Brake_sys_connectors = 'Good'; ?>
							<?=  $form->field($model, 'Tr_Brake_sys_connectors')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?>
							</td></tr>
													<tr><th>Brake Chamber</th> <td><?php  $model->Tr_Brake_chamber = 'Good'; ?>
							<?=  $form->field($model, 'Tr_Brake_chamber')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?></td></tr>
													<tr><th>Air Tank</th> <td><?php  $model->Trb_air_tank = 'Good'; ?>
							<?=  $form->field($model, 'Trb_air_tank')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?>
							</td></tr>	 
													<tr><th>Relay Valve</th> <td>	<?php  $model->Trb_relay_valve = 'Good'; ?>
							<?=  $form->field($model, 'Trb_relay_valve')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?></td></tr>
													<tr><th>Brake Hose(s)</th> <td><?php  $model->Tr_brake_hose = 'Good'; ?>
							<?=  $form->field($model, 'Tr_brake_hose')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?></td></tr>
							<tr><th>Parking Brake & its Lever</th> <td>
							<?php  $model->Tr_parkingbrake_lever = 'Good'; ?>
							<?=  $form->field($model, 'Tr_parkingbrake_lever')->radioList(['Good'=>'Good', 'Not Good'=>'Not Good'])->label(false)?> </td>
							</tr>				  
						
					  </tbody>
					</table>
					<div class="field" align="left">
					  <h3> Images</h3>
					  <input type="file" id="files" name="files[]" multiple />
					</div>
					<div class="field" align="left">
					  <h3>Acknowledge by</h3>
					  <input type="file" id="acknowledgeby" name="ackby"  />
					</div>
					<div class="field" align="left">
					 <h3>Customer Signature</h3>
					<div class="col-md-6">
					<div class="tools">
					
					<label>Signature of customer</label><br>
					<a href="#colors_sketch" data-tool="marker">Marker</a> <a href="#colors_sketch" data-tool="eraser">
						Eraser</a>
					</div>

					<canvas id="colors_sketch" width="500" height="200">
					</canvas>
					
					<input type="button" id="btnSave" value="Save as Image" />
					
					<img id = "imgCapture" alt = "" style = "display:none;border:1px solid #ccc" />
					</div>
					</div>
					
					 <div class="form-group">
						<?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
					</div>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
					<?php ActiveForm::end(); ?>
				  </div>
				</div>
		<!--Trailer Modal End-->

			<div class="row">
				<div class="col-sm-2 col-md-2">
				 <?=$form->field($model, "Booking_refno")->widget(Select2::classname(), [
							'data' =>ArrayHelper::map(Bookinggroups::find('bookingref_no')->where(['movetype'=>'collection'])->all(),'bookingref_no','bookingref_no'), 
							'theme' => Select2::THEME_CLASSIC,
							'language' => 'en',
							'options' => ['placeholder' => 'Booking No','class'=>'bookingref_no'],
							'pluginOptions' => [
							'allowClear' => true   ],
							])->label('Booking No'); 
					?>
				</div>
			</div>
	

			<div class="booking-index">	
			
				 <?= GridView::widget([
					'dataProvider' => $dataProvidertr,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						'size',
						'Type',
						'bookingref_no',
						'Qty',
												
						['class' => 'yii\grid\ActionColumn', 
						'template' => '{view}',
						'headerOptions' => ['width' => '20%', 'class' => 'activity-view-link',],        
						'contentOptions' => ['class' => 'padding-left-5px'],

					'buttons' => [
						'view' => function ($url, $model, $key) {
							return Html::a('<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">Add Inspection</button>','#', [
								'id' => $model->bookingref_no 	

							]);
						},
					],

					],],
					
					
				]); ?> 
			

			</div>
			
			</div>
			
			  <div class="tab-pane" id="pm">
			  
			  <!-- Modal PM -->
				
				<div id="myModal1" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <?php $form = ActiveForm::begin([
					'id' => 'pm-form',
					'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
					]); ?>	
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					  </div>
					  <div class="modal-body">
					<table class="table table-bordered">
					  <thead>
						<tr>
						  
						  <th scope="col">List</th>
						  <th scope="col"> Condition</th>
						
						</tr>
					  </thead>
					  <tbody>
					  	<tr>
						  <th scope="row">Windscreen</th> 
						 
						 <td> <?php  $model->Pm_windscreen = 'NoCracks'; ?>
							<?=  $form->field($model,'Pm_windscreen')->radioList(['NoCracks'=>'No Cracks', 'Damage'=>'Damage'])->label(false) ?>
						 </td>
						 
						</tr>
						<tr><th scope="row">Wiper_left</th> 
						<td><?php  $model->Pm_wipers_left = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_wipers_left')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
						</td>
						</tr>
						<tr><th scope="row">Wiper_right</th> 
						<td><?php  $model->Pm_wipers_right = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_wipers_right')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
						</td>
						</tr>
							<tr><th scope="row">Headlights_left</th> <td><?php  $model->Pm_headlights_left = 'Condition'; ?>
	<?=  $form->field($model, 'Pm_headlights_left')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
						</td>
						</tr>
							<tr><th scope="row">Headlights_right</th> <td>
	<?php  $model->Pm_headlights_right = 'Condition'; ?>
	<?=  $form->field($model, 'Pm_headlights_right')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
    

						</td>
						</tr>
							<tr><th scope="row">Highbeam_left</th> <td>
	
 	<?php  $model->Pm_highbeam_left = 'Condition'; ?>
	<?=  $form->field($model, 'Pm_highbeam_left')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
   

						</td>
						</tr>
							<tr><th scope="row">Highbeam_right</th> <td>
	<?php  $model->Pm_highbeam_right = 'Condition'; ?>
	<?=  $form->field($model, 'Pm_highbeam_right')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
  
						</td>
						</tr>
							<tr><th scope="row">Signal_light_left</th> <td>
	<?php  $model->signal_light_left = 'Condition'; ?>
	<?=  $form->field($model, 'signal_light_left')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
   
						</td>
						</tr>
							<tr><th scope="row">Signal_light_right</th> <td>
	<?php  $model->signal_light_right = 'Condition'; ?>
	<?=  $form->field($model, 'signal_light_right')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
 
						</td>
						</tr>
						<tr><th scope="row">Beacon</th> <td>

	<?php  $model->Beacon = 'Condition'; ?>
	<?=  $form->field($model, 'Beacon')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
   

						</td>
						</tr>
							<tr><th scope="row">Overall_body</th> <td>

	<?php  $model->Overall_body = 'Condition'; ?>
	<?=  $form->field($model, 'Overall_body')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
   
						</td>
						</tr>
							<tr><th scope="row">Tyre_air_Pressure_left</th> <td>
	<?php  $model->Pm_ft_whl_Inf_tyre_left = 'Condition'; ?>
	<?=  $form->field($model, 'Pm_ft_whl_Inf_tyre_left')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
  
						</td>
						</tr>
						<tr><th scope="row">Tyre_air_Pressure_right</th> <td>
	<?php  $model->Pm_ft_whl_Inf_tyre_right = 'Condition'; ?>
	<?=  $form->field($model, 'Pm_ft_whl_Inf_tyre_right')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
						</td>
						</tr>
						<tr><th scope="row">Suspension_left</th> <td>
	<?php  $model->Pm_suspension_left = 'Condition'; ?>
	<?=  $form->field($model, 'Pm_suspension_left')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
   
						</td>
						</tr>
							<tr><th scope="row">Suspension_right</th> <td>
	<?php  $model->Pm_suspension_right = 'Condition'; ?>
	<?=  $form->field($model, 'Pm_suspension_right')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
   
						</td>
						</tr>
							<tr><th scope="row">Tyre_Baldness & cuts_left</th> <td>
	<?php  $model->Pm_tyre_cond_left = 'Condition'; ?>
	<?=  $form->field($model, 'Pm_tyre_cond_left')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
  
						</td>
						</tr>
							<tr><th scope="row">Tyre_Baldness & cuts_right</th> <td>
	<?php  $model->Pm_tyre_cond_right = 'Condition'; ?>
	<?=  $form->field($model, 'Pm_tyre_cond_right')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
   
						</td>
						</tr>
						<tr><th scope="row">Rims & Nuts Condition_left</th> <td>
						<?php  $model->Pm_rim_nuts_left = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_rim_nuts_left')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
    
						</td>
						</tr>
						<tr><th scope="row">Rims & Nuts Condition_right</th> <td>	<?php  $model->Pm_rim_nuts_right = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_rim_nuts_right')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition']) ?>
  
						</td>
						</tr>
						<tr><th scope="row">Doors left & right</th> <td>
						<?php  $model->Pm_doors_left_right = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_doors_left_right')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition']) ->label(false) ?>
  
						</td>
						</tr>
						<tr><th scope="row">steering_wheel</th> <td>
						<?php  $model->Pm_steering_wheel = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_steering_wheel')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
		
						</td>
						</tr>
						<tr><th scope="row">Signal_lights_panel</th> <td>	<?php  $model->Pm_signal_lights_panel = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_signal_lights_panel')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
    
						</td>
						</tr>
						<tr><th scope="row">Wipers</th> <td> <?php  $model->Pm_wipers = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_wipers')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
	
						</td>
						</tr>
						<tr><th scope="row">Speedo_meter</th> <td>
						<?php  $model->Pm_speedo_meter = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_speedo_meter')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
    
						</td>
						</tr>
						<tr><th scope="row">Tacho_meter</th> <td>
						<?php  $model->Pm_tacho_meter = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_tacho_meter')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
						</td>
						</tr>
						<tr><th scope="row">Odometer</th> <td><?php  $model->Pm_odometer = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_odometer')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
   						</td>
						</tr>
						<tr><th scope="row">Fuel_level</th> <td>
						<?php  $model->Pm_fuel_level = 'Enough'; ?>
						<?=  $form->field($model, 'Pm_fuel_level')->radioList(['Enough'=>'Enough', 'Not Enough'=>'Not Enough'])->label(false) ?>

						</td>
						</tr>
						<tr><th scope="row">Sidemirror_left</th> <td><?php  $model->Pm_sidemirror_left = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_sidemirror_left')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition']) ->label(false) ?>
   
						</td>
						</tr>
						<tr><th scope="row">Sidemirror_right</th> <td>
						<?php  $model->Pm_sidemirror_right = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_sidemirror_right')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
						</td>
						</tr>
						<tr><th scope="row">Various_foot_pedals</th> <td><?php  $model->Pm_various_foot_pedals = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_various_foot_pedals')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition']) ->label(false) ?>
   						</td>
						</tr>
						<tr><th scope="row">Aircorn</th> <td>
							<?php  $model->Pm_aircorn = 'Condition'; ?>
							<?=  $form->field($model, 'Pm_aircorn')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>  
						 
						</td>
						</tr>
						<tr><th scope="row">Road_tax</th> <td><?php  $model->Pm_road_tax = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_road_tax')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
   
						</td>
						</tr>
						<tr><th scope="row">Inspection</th> <td>
							<?php  $model->Insp_disc = 'Condition'; ?>
							<?=  $form->field($model, 'Insp_disc')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
						   
						</td>
						</tr>
						<tr><th scope="row">TERP</th> <td><?php  $model->Pm_TERP = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_TERP')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>   
  
						</td>
						</tr>
						<tr><th scope="row">Spill Response Kit</th> <td>
							<?php  $model->spil_kit = 'Condition'; ?>
							<?=  $form->field($model, 'spil_kit')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>  
						   
						</td>
						</tr><tr><th scope="row">Fuel Tank</th> <td> 
						<?php  $model->Pm_fuel_tank = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_fuel_tank')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>

						</td>
						</tr>
						
						<tr><th scope="row">Fire Extinguisher(s)</th> <td>
						<?php  $model->Pm_fire_ext = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_fire_ext')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
	

						</td>
						</tr>
						<tr><th scope="row">Connector-Vacuum(hose)</th> <td>
						<?php  $model->Pm_conn_vacuum = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_conn_vacuum')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
  
						</td>
						</tr>
						<tr><th scope="row">Connector-Electrical(Cable)</th> <td>
						<?php  $model->Pm_conn_electrical = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_conn_electrical')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
					   
						</td>
						</tr>
						<tr><th scope="row">Connector - Brake(system)</th> <td>
						<?php  $model->Pm_Conn_brake = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_Conn_brake')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
					   
						</td>
						</tr>
						<tr><th scope="row">Rear_whl_inf_tyre_left</th> <td><?php  $model->Pm_rear_whl_inf_tyre_left = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_rear_whl_inf_tyre_left')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
   
						</td>
						</tr><tr><th scope="row">Rear_mudguards_left</th> <td> 
						<?php  $model->Pm_rear_mudguards_left = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_rear_mudguards_left')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
					  
						</td>
						</tr>
						<tr><th scope="row">Rear_suspensions_left</th> <td><?php  $model->Pm_rear_suspensions_left = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_rear_suspensions_left')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
   

						</td>
						</tr>
						<tr><th scope="row">Rear_tyre_condition_left</th> <td>
						<?php  $model->Pm_rear_tyre_condition_left = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_rear_tyre_condition_left')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>
						
						</td>
						</tr>
						<tr><th scope="row">Rear_whl_inf_tyre_right</th> <td>
						<?php  $model->Pm_rear_whl_inf_tyre_right = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_rear_whl_inf_tyre_right')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>

						</td>
						</tr>
						<tr><th scope="row">Rear_mudguards_right</th> <td>
						<?php  $model->Pm_rear_mudguards_right = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_rear_mudguards_right')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>

						</td>
						</tr>
						<tr><th scope="row">Rear_suspensions_right</th> <td><?php  $model->Pm_rear_suspensions_right = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_rear_suspensions_right')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>


						</td>
						</tr>
						<tr><th scope="row">Rim_nuts time</th> <td>	<?php  $model->Pm_rim_nuts = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_rim_nuts')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>

						</td>
						</tr>
						<tr><th scope="row">Num_plates_light</th> <td>
						<?php  $model->Pm_num_plates_light = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_num_plates_light')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>

						</td>
						</tr>
						<tr><th scope="row">Break_lights</th> <td>
						<?php  $model->Pm_break_lights = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_break_lights')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false)?>


						</td>
						</tr>
						<tr><th scope="row">Reverse_lights</th> <td>
						<?php  $model->Pm_reverse_lights = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_reverse_lights')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>

						</td>
						</tr>
						<tr><th scope="row">signal_lights</th> <td>	<?php  $model->Pm_signal_lights = 'Condition'; ?>
						<?=  $form->field($model, 'Pm_signal_lights')->radioList(['Condition'=>'Condition', 'Not in Condition'=>'Not in Condition'])->label(false) ?>
	
	
						</td>
						</tr>
						
					  
					  </tbody>
					</table>
					<div class="field" align="left">
					  <h3>Images</h3>
					  <input type="file" id="pmfiles" name="pmfiles[]" multiple />
					</div>
					<div class="field" align="left">
					  <h3>Acknowledge by</h3>
					  <input type="file" id="pmacknowledgeby" name="pmackby"  />
					</div>
					

					 <div class="form-group">
						<?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
					</div>
					
						
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
					<?php ActiveForm::end(); ?>
				  </div>
				</div>
		<!--PM Modal End-->
		
		
			<div class="row">
				<div class="col-sm-2 col-md-2">
				 <?=$form->field($model1, "Booking_refno")->widget(Select2::classname(), [
							'data' =>ArrayHelper::map(Bookinggroups::find('bookingref_no')->where(['movetype'=>'collection'])->all(),'bookingref_no','bookingref_no'), 
							'theme' => Select2::THEME_CLASSIC,
							'language' => 'en',
							'options' => ['placeholder' => 'Booking No','class'=>'pmbookingref_no','id'=>'pmbookingref_no'],
							'pluginOptions' => [
							'allowClear' => true   ],
							])->label('Booking No'); 
					?>
				</div>
			</div>
				
			    <div class="booking-index">	
					<?= GridView::widget([
					'dataProvider' => $dataProviderpm,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						'size',
						'Type',
						'bookingref_no',
						'Qty',
						
							
				[   'class' => 'yii\grid\ActionColumn', 
					'template' => '{view}',
					'headerOptions' => ['width' => '20%', 'class' => 'activity-view-link',],        
						'contentOptions' => ['class' => 'padding-left-5px'],

					'buttons' => [
						'view' => function ($url, $model, $key) {
							return Html::a('<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal1">Add Inspection</button>','#', [
								

							]);
						},
					],

					],],
					
					
				]); ?> 
				
				</div>
			  </div>
			  <div class="tab-pane" id="facilities"> 
			  <!-- Modal Facilities -->
				
				<div id="myModal2" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <?php $form = ActiveForm::begin([
					'id' => 'fa-form',
					'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
					]); ?>	
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					  </div>
					  <div class="modal-body">
					<table class="table table-bordered">
					  <thead>
						<tr>
						  
						  <th scope="col">List</th>
						  <th scope="col"> Condition</th>
						
						</tr>
					  </thead>
					  <tbody>
					  	<tr>
						  <th scope="row"></th> 
						  
						 <td>  </td>
						 
						</tr>
					  
					  </tbody>
					</table>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
					<?php ActiveForm::end(); ?>
				  </div>
				</div>
		<!--Facilities Modal End-->
			<div class="row">
			<div class="col-sm-2 col-md-2">
                                 <?=  
								$form->field($modelbookinggroups2, "bookingref_no")->widget(Select2::classname(), [
								'data' => ['collection2' => 'collection2', 'return2' => 'return2'],
								'theme' => Select2::THEME_CLASSIC,
								'language' => 'en',
								'options' => ['placeholder' => 'Move type...','class'=>'mtype'],
								'pluginOptions' => [
								'allowClear' => true ],
								])->label('Booking NO');
								?>
								</div>
								</div>
								<div class="booking-index">	
									 <?= GridView::widget([
										'dataProvider' => $dataProviderall,
										'filterModel' => $searchModel,
										'columns' => [
											['class' => 'yii\grid\SerialColumn'],
											'size',
											'Type',
											'bookingref_no',
											'Qty',
											
												
									[   'class' => 'yii\grid\ActionColumn', 
										'template' => '{view}',
										'headerOptions' => ['width' => '20%', 'class' => 'activity-view-link',],        
											'contentOptions' => ['class' => 'padding-left-5px'],

										'buttons' => [
											'view' => function ($url, $model, $key) {
												
												return Html::a('<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal2">Add Inspection</button>','#', [
														
														

												]);
											},
										],

										],],
										
										
									]); ?> 
							
								</div>
							</div>
							</div>
						</div>	
					</div>	
				</div>	
			</div>	
		</div>
 </div>
</div>

<?php
$script = <<< JS
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
               
        });
        fileReader.readAsDataURL(f);
      }
    });
	
	$("#pmfiles").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#pmfiles");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
               
        });
        fileReader.readAsDataURL(f);
      }
    });
	
	 
  	$("#acknowledgeby").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#acknowledgeby");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
               
        });
        fileReader.readAsDataURL(f);
      }
    });
  
  	$("#pmacknowledgeby").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#pmacknowledgeby");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
               
        });
        fileReader.readAsDataURL(f);
      }
    });
	
	
  } 
  
  else {
    alert("Your browser does not support to File API")
  }
  


$("#trailer-form").on("beforeSubmit", function (event) {
	event.preventDefault();
	alert('hi');
	var formData = new FormData(this);
	alert(formData);
		  $.ajax({
			url: 'index.php?r=vehicleins/create',
			cache: false,
			contentType: false,
			processData: false,
			data: formData,                      
			type: 'post',                      
			success: function(response){
			$('#trailer-form')[0].reset();
			
			},
			error: function (data) {
			alert("There may a error on uploading. Try again later");
			}
			
		  });

	return false;
 
});



});

	
/*$("#pm-form").on("beforeSubmit", function (event) {
	event.preventDefault();
	alert('hi');
	var formData = new FormData(this);
	alert(formData);
		  $.ajax({
			url: 'index.php?r=vehicleins/create',
			cache: false,
			contentType: false,
			processData: false,
			data: formData,                      
			type: 'post',                      
			beforeSend: function() {
			
			success: function(response){
			$('#trailer-form')[0].reset();
			
			},
			complete: function() {
		
			},
			error: function (data) {
			alert("There may a error on uploading. Try again later");
			}
		});

	return false;
 
});

});

$("#facilities-form").on("beforeSubmit", function (event) {
	event.preventDefault();
	alert('hi');
	var formData = new FormData(this);
	alert(formData);
		  $.ajax({
			url: 'index.php?r=vehicleins/create',
			cache: false,
			contentType: false,
			processData: false,
			data: formData,                      
			type: 'post',                      
			beforeSend: function() {
			
			success: function(response){
			$('#trailer-form')[0].reset();
			
			},
			complete: function() {
		
			},
			error: function (data) {
			alert("There may a error on uploading. Try again later");
			}
		});

	return false;
 
});

});*/




JS;
$this->registerJs($script);
?>