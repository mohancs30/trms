<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveField;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use app\models\Vehicleins;
use app\models\VehicleinsSearch;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use kartik\date\DatePicker;
use app\models\Booking;
use yii\helpers\CONSTANT;
use app\models\Mstvehicle;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model app\models\Vechicleins */
/* @var $form yii\widgets\ActiveForm */
?>

<head>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/mobomo/sketch.js/master/lib/sketch.min.js" type="text/javascript"></script>
<style>

#my_camera{
 width: 320px;
 height: 240px;
 border: 1px solid black;
}

#my_camera1{
 width: 320px;
 height: 240px;
 border: 1px solid black;
}
 .tools a
        {
            text-decoration: none;
        }
        #colors_sketch
        {
            border: 1px solid #ccc;
        }

.control-label{
float: left;
clear: none;
display: block;
padding: 0px 1em 0px 8px;
color:red;
}
	

label input[type=radio]{
	
	color:red;
}

	
.checkmark input:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark input:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

div.options > label > input {
	
	visibility: hidden;
}

div.options > label {
	display: block;
	margin: 0 0 0 -10px;
	padding: 0 0 20px 0;  
	height: 20px;
	width: 150px;
}

div.options > label > img {
	display: inline-block;
	padding: 0px;
	height:30px;
	width:30px;
	background: none;
}

div.options > label > input:checked +img {  
	background: url(http://cdn1.iconfinder.com/data/icons/onebit/PNG/onebit_34.png);
	background-repeat: no-repeat;
	background-position:center center;
	background-size:30px 30px;
}
</style>

</head>
<div class="vehicleins-form">
<?php $modelbooking =new Booking(); ?>
    <?php $form = ActiveForm::begin([
    'id' => 'trailer-form',
    'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
	]); ?>
	

	
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
			<div class="card-body">
				<h4 class="header-title mb-4">Vehicle Inspection</h4>
				<div class="span12">
			
					<div id="tab" class="btn-group" data-toggle="buttons-radio">
						<a href="#tr" type="button"  class="btn btn-primary btn-lg"  data-toggle="tab">Trailer</a>
						<a href="#pm" type="button"  class="btn btn-primary btn-lg"  data-toggle="tab">Prime Mover</a>
						<a href="#facilities"  type="button"  class="btn btn-primary btn-lg" data-toggle="tab">Facilities</a>
					   
					</div>
			
					<div class="tab-content">
						  <div class="tab-pane active" id="tr">tr content
						  
						  
						  </div>
						  <div class="tab-pane" id="pm">pm content
						  
						  
						  </div>
						  <div class="tab-pane" id="facilities"> facilities content
						  
						  </div>
					</div>
				
				</div>	
			</div>	
			</div>	
		</div>	
	</div>
		
	<?php ActiveForm::end(); ?>

