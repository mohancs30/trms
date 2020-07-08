<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveField;
use kartik\select2\Select2;
use app\models\Bookinggroups;
use app\models\Booking;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Vehicleins;
use yii\db\ActiveRecord;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<head>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style>
#tabright{
	float: right;
}
</style>
</head>
<div class="container">
	<div class="row">
		<div class="span12">
			<p>
			<a class="btn btn-success" href="/trms/web/index.php?r=booking/create">Create Booking</a>    
			</p>
            <div id="tab" class="btn-group" data-toggle="buttons-radio">
              <a href="#Collection" type="button"  class="btn btn-primary btn-xs"  data-toggle="tab">Collection</a>
              <a href="#return"  type="button"  class="btn btn-primary btn-xs" data-toggle="tab">return</a>
           
            </div>
			
			
             <div id="tab" class="btn-group" data-toggle="buttons-radio" style="float: right;">
		
			  <a href="#all" type="button" class="btn btn-outline-dark btn-xs"  data-toggle="tab">All</a>
              <a href="#pending" type="button" class="btn btn-outline-primary btn-xs"  data-toggle="tab">Pending Jobs</a>
			  <a href="#Completed" type="button" class="btn btn-outline-warning btn-xs" data-toggle="tab">Completed </a>
			  <a href="#invoiced" type="button" class="btn btn-outline-success btn-xs" data-toggle="tab">Invoiced Jobs</a>
              <a href="#rejected" type="button" class="btn btn-outline-danger btn-xs"  data-toggle="tab">Rejected</a>
			  
			</div>
				  
            <div class="tab-content">
              <div class="tab-pane active" id="Collection">
			   <!-- Modal collection -->
				
				<div id="myModalcollection" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <?php $form = ActiveForm::begin([
						'id' => 'formcollection',
						'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
						]); ?>
					
	   
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					  </div>
					  <div class="modal-body">
					
					<input type="text" name="id" id="post-id">
					
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
					<?php ActiveForm::end(); ?>
				  </div>
				</div>
		<!--collection Modal End-->
		
			  <div class="booking-index">	

			  <?php Pjax::begin(['id' => 'a']); ?>
				<?= GridView::widget([
				
					'dataProvider' => $dataProvidercollection,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						'groups',
						'bookingref_no',
						'bookingtype',
						'Arrival_date',
						'status',
						'c_by',
						[   'class' => 'yii\grid\ActionColumn', 
							'template' => '{view}{Delete}',
							'headerOptions' => ['width' => ' 5%', 'class' => 'activity-view-link',],        
								'contentOptions' => ['class' => 'padding-left-5px'],

							'buttons' => [
								'view' => function ($url, $model, $key) {
									
									return Html::a('<button type="button" class="btn btn-success btn-xs" id="collection" btn-xs" data-toggle="modal" data-target="#myModalcollection" >Accept</button>','#', [
										

									]);
								},
							],

						],
						
						
						],
				]);  
				
				 Pjax::end(); ?>
				
			</div>
		 </div>
		 
        <div class="tab-pane" id="return">
			
 <!-- Modal collection -->
				
				<div id="myModalreturn" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <?php $form = ActiveForm::begin([
						'id' => 'formreturn',
						'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
						]); ?>
					
	   
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					  </div>
					  <div class="modal-body">
					

					
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
					<?php ActiveForm::end(); ?>
				  </div>
				</div>
		<!--collection Modal End-->

		
			   <div class="booking-index">	
 
			<?= GridView::widget([
				
					'dataProvider' => $dataProviderreturn,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						'groups',
						'bookingref_no',
						'bookingtype',
						'Arrival_date',
						'status',
						'c_by',
						[   'class' => 'yii\grid\ActionColumn', 
							'template' => '{accept}',
							'headerOptions' => ['width' => ' 5%', 'class' => 'activity-view-link',],        
								'contentOptions' => ['class' => 'padding-left-5px'],

							'buttons' => [
								'accept' => function ($url, $model, $key) {
									return Html::a('<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalreturn">Retutn</button>','#', [
								]);
								},
							],

						],
						[   'class' => 'yii\grid\ActionColumn', 
							'template' => '{return}',
							'headerOptions' => ['width' => ' 5%', 'class' => 'activity-view-link',],        
								'contentOptions' => ['class' => 'padding-left-5px'],

							'buttons' => [
								'return' => function ($url, $model, $key) {
									return Html::a('<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalreturn">View</button>','#', [
								]);
								},
							],

					],
						
						
						],
				]);  
				
				
				?>
			</div>
			  
		</div>
			  
              <div class="tab-pane"  id="all" >
		
			   <div class="booking-index">	
 	  		 <!-- Modal all -->
				
				<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <?php $form = ActiveForm::begin([
						'id' => 'all',
						'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
						]); ?>
					
	   
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					  </div>
					  <div class="modal-body">
					

					
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
					<?php ActiveForm::end(); ?>
				  </div>
				</div>
				<!--All Modal End-->
				<?= GridView::widget([
				
					'dataProvider' => $dataProviderall,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						'groups',
						'bookingref_no',
						'bookingtype',
						'Arrival_date',
						'status',
						'c_by',
						[   'class' => 'yii\grid\ActionColumn', 
							'template' => '{view}{Delete}',
							'headerOptions' => ['width' => ' 5%', 'class' => 'activity-view-link',],        
								'contentOptions' => ['class' => 'padding-left-5px'],

							'buttons' => [
								'view' => function ($url, $model, $key) {
									
									return Html::a('<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">Accept</button>','#', [
										

									]);
								},
							],

					],
						
						
						],
				]);  
				
				
				?>
			</div>
			  </div>
			  
              <div class="tab-pane" id="pending">
			  
			  	 <!-- Modal pending -->
				
				<div id="myModalpending" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <?php $form = ActiveForm::begin([
						'id' => 'formpending',
						'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
						]); ?>
					
	   
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					  </div>
					  <div class="modal-body">
					

					
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
					<?php ActiveForm::end(); ?>
				  </div>
				</div>
		<!--All Modal End-->
		
		
			   <div class="booking-index">	
 
				<?= GridView::widget([
				
					'dataProvider' => $dataProviderpending,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						'groups',
						'bookingref_no',
						'bookingtype',
						'Arrival_date',
						'status',
						'c_by',
						[   'class' => 'yii\grid\ActionColumn', 
							'template' => '{view}{Delete}',
							'headerOptions' => ['width' => ' 5%', 'class' => 'activity-view-link',],        
								'contentOptions' => ['class' => 'padding-left-5px'],

							'buttons' => [
								'view' => function ($url, $model, $key) {
									return Html::a('<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalpending">Accept</button>','#', [
								]);
								},
							],

						],
						
						
						],
				]);  
				
				
				?>
			</div>
			  
			  </div>
			   <div class="tab-pane" id="Completed">
			   <!-- Modal completed -->
				
				<div id="myModalcompleted" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <?php $form = ActiveForm::begin([
						'id' => 'formcompleted',
						'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
						]); ?>
					
	   
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					  </div>
					  <div class="modal-body">
					

					
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
					<?php ActiveForm::end(); ?>
				  </div>
				</div>
		<!--Completed Modal End-->
			   
			   <div class="booking-index">	
 
				<?= GridView::widget([
				
					'dataProvider' => $dataProvidercompleted,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						'groups',
						'bookingref_no',
						'bookingtype',
						'Arrival_date',
						'status',
						'c_by',
						[   'class' => 'yii\grid\ActionColumn', 
							'template' => '{view}{Delete}',
							'headerOptions' => ['width' => ' 5%', 'class' => 'activity-view-link',],        
								'contentOptions' => ['class' => 'padding-left-5px'],

							'buttons' => [
								'view' => function ($url, $model, $key) {
									return Html::a('<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalcompleted">Invoice</button>','#', [
								]);
								},
							],

						],
						
						
						],
				]);  
				
				
				?>
			</div>
			  
			  </div>
			  <div class="tab-pane" id="invoiced">
			  	   <!-- Modal completed -->
				
				<div id="myModalinvoiced" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <?php $form = ActiveForm::begin([
						'id' => 'forminvoiced',
						'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
						]); ?>
					
	   
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					  </div>
					  <div class="modal-body">
					

					
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
					<?php ActiveForm::end(); ?>
				  </div>
				</div>
		<!--Completed Modal End-->
			 <div class="booking-index">	
 
				<?= GridView::widget([
				
					'dataProvider' => $dataProviderinvoiced,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						'groups',
						'bookingref_no',
						'bookingtype',
						'status',
						'c_by',
						[   'class' => 'yii\grid\ActionColumn', 
							'template' => '{view}{Delete}',
							'headerOptions' => ['width' => '5%', 'class' => 'activity-view-link',],        
								'contentOptions' => ['class' => 'padding-left-5px'],

							'buttons' => [
								'view' => function ($url, $model, $key) {
									return Html::a('<button type="button" class="btn btn-success btn-xs" id="invoiced" data-toggle="modal" data-target="#myModalinvoiced">View</button>','#', [
								]);
								},
							],

						],
						
						
						],
				]);  
				
				
				?>
			</div>
			  
			</div>
			  
			  
			  
			   <div class="tab-pane" id="rejected">
			   
			   	   <!-- Modal rejected -->
				
				<div id="myModalrejected" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <?php $form = ActiveForm::begin([
						'id' => 'rejected',
						'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
						]); ?>
					
	   
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					  </div>
					  <div class="modal-body">
					

					
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
					<?php ActiveForm::end(); ?>
				  </div>
				</div>
		<!--rejected Modal End-->
			   
			   
			   <div class="booking-index">	
 
				<?= GridView::widget([
				
					'dataProvider' => $dataProviderrejected,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						'groups',
						'bookingref_no',
						'bookingtype',
						'Arrival_date',
						'status',
						'c_by',
						['class' => 'yii\grid\ActionColumn', 
							'template' => '{view}',
							'headerOptions' => ['width' => '5%', 'class' => 'activity-view-link',],        
								'contentOptions' => ['class' => 'padding-left-5px'],

							'buttons' => [
								'view' => function ($url, $model, $key) {
									return Html::a('<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModalrejected">Re-assign</button>','#', [
								]);
								},
							],
						

						],
						
						
						],
				]);  
				
				
				?>
			</div>
			  
			  </div>
            </div>
        
        </div>
</div>
</div>


<?php $js = '

$( "#collection" ).click(function() {
	
    $("#myModalcollection #post-id").val(id);
});

';
$this->registerJs($js);
?>