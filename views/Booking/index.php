<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<head>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
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
              <a href="#Collection" type="button"  class="btn btn-primary btn-lg"  data-toggle="tab">Collection</a>
              <a href="#return"  type="button"  class="btn btn-primary btn-lg" data-toggle="tab">return</a>
           
            </div>
			
			
             <div id="tab" class="btn-group" data-toggle="buttons-radio" style="float: right;">
		
			  <a href="#all" type="button" class="btn btn-outline-dark"  data-toggle="tab">All</a>
              <a href="#pending" type="button" class="btn btn-outline-primary"  data-toggle="tab">Pending</a>
			   <a href="#cancel" type="button" class="btn btn-outline-warning" data-toggle="tab">Closed</a>
			      <a href="#invoiced" type="button" class="btn btn-outline-success" data-toggle="tab">Invoiced</a>
              <a href="#rejected" type="button" class="btn btn-outline-danger"  data-toggle="tab">Rejected</a>
			 </div>
				  
            <div class="tab-content">
              <div class="tab-pane active" id="Collection">Collection content
			  
			  <div class="booking-index">	
			
				<?= GridView::widget([
				
					'dataProvider' => $dataProvider1,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						'size',
						'groups',
						'bookingref_no',
						'req_qty',
						'status',
						'parking_loc',
						'remarks',
						'From_date',
						'To_date',
						'c_by',
						'c_date',
						[
						
						'class' => 'yii\grid\ActionColumn',
						'template' => '{accept}{reject}',
					     'buttons' => [
						'accept' => function ($url, $model, $key) {
							    return Html::a('<button type="button" class="btn btn-success">Accept</button>','#', [
								'class' => 'activity-view-link',
								'title' => Yii::t('yii', 'View'),
								'data-toggle' => 'modal',
								'data-target' => '#activity-modal',
								'data-id' => $key,
								'data-pjax' => '0',
							]);
						},
						'reject' => function ($url, $model, $key) {
							    return Html::a('<button type="button" class="btn btn-danger">Reject</button>','#', [
								'class' => 'activity-view-link',
								'title' => Yii::t('yii', 'View'),
								'data-toggle' => 'modal',
								'data-target' => '#activity-modal',
								'data-id' => $key,
								'data-pjax' => '0',
							]);
						},
						
						
							],
						],
						
						
						],
				]);  
				
				
				?>
			</div>
		 </div>
		 
        <div class="tab-pane" id="return">Return
			  
			   <div class="booking-index">	
 
				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						
						'Movetype',
						'VehicleRegNo',
						'bookingref_no',
						'Fromdate',
						'Todate',
						'status',
						'Remarks',
						'C_date',
						'C_By',
						//'M_date',
						//'M_By',

						
					],
				]); ?>
			</div>
			  
		</div>
			  
              <div class="tab-pane"  id="all" >All Content
			   <div class="booking-index">	
 
				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						
						
						'VehicleRegNo',
						'bookingref_no',
						'Fromdate',
						'Todate',
						'status',
						
						'C_date',
						'C_By',
						//'M_date',
						//'M_By',

						
					],
				]); ?>
			</div>
			  </div>
			  
              <div class="tab-pane" id="pending">pending Content
			   <div class="booking-index">	
 
				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
					
					
						'VehicleRegNo',
						'bookingref_no',
						'Fromdate',
						'Todate',
						'status',
						
						'C_date',
						'C_By',
						//'M_date',
						//'M_By',

						
					],

				]); ?>
			</div>
			  
			  </div>
			   <div class="tab-pane" id="cancel">cancel Content
			   <div class="booking-index">	
 
				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						
						'VehicleRegNo',
						'bookingref_no',
						'Fromdate',
						'Todate',
						'status',
						
						'C_date',
						'C_By',
						//'M_date',
						//'M_By',

						
					],
				]); ?>
			</div>
			  
			  </div>
			  <div class="tab-pane" id="invoiced">Invoiced Content
			   <div class="booking-index">	
 
				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						
						
						'VehicleRegNo',
						'bookingref_no',
						'Fromdate',
						'Todate',
						'status',
						
						'C_date',
						'C_By',
						//'M_date',
						//'M_By',

						
					],
				]); ?>
			</div>
			  
			  </div>
			  
			  
			  
			   <div class="tab-pane" id="rejected">rejected Content
			   <div class="booking-index">	
 
				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						
						'VehicleRegNo',
						'bookingref_no',
						'Fromdate',
						'Todate',
						'status',
						
						'C_date',
						'C_By',
						//'M_date',
						//'M_By',

						
					],
				]); ?>
			</div>
			  
			  </div>
            </div>
        
        </div>
</div>
</div>
