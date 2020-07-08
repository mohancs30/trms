<?php
namespace app\controllers;
use Yii;
use app\models\Booking;
use app\models\Mstvehicle;
use app\models\BookingSearch;
use app\models\Bookinggroups;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;
use yii\web\Response;
use yii\helpers\CONSTANT;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;
/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Booking models.
     * @return mixed
     */
    public function actionIndex()
    {
		$model = new Booking();
		$modelbookinggroups = new Bookinggroups;
		$modelvehicle = new Mstvehicle();
	    $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM bookinggroups WHERE status=:status', [':status' => 'A'])->queryScalar();

		$dataProvider1 = new SqlDataProvider([
			'sql' => 'SELECT * FROM bookinggroups WHERE status=:status',
			'params' => [':status' => 'A'],
			'totalCount' => $count,
			'sort' => [
			'attributes' => [
			'size',
			'status',
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
				],
			],
			'pagination' => [
				'pageSize' => 20,
			],
			]);

			// get the user records in the current page
			$models = $dataProvider->getModels();


			$dataProvidercollection = $searchModelcollection->search(Yii::$app->request->queryParams);
			$dataProviderreturn = $searchModelreturn->search(Yii::$app->request->queryParams);
			$dataProviderall = $searchModelall->search(Yii::$app->request->queryParams);
			$dataProviderpending = $searchModelpending->search(Yii::$app->request->queryParams);
			$dataProviderclosed = $searchModelclosed->search(Yii::$app->request->queryParams);
			$dataProviderinvoiced = $searchModelinvoiced->search(Yii::$app->request->queryParams);
			$dataProviderrejected = $searchModelrejected->search(Yii::$app->request->queryParams);    

        return $this->render('index',[
			'model' => $model,	
			'modelvehicle'=>$modelvehicle,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'dataProvider1' => $dataProvider1,
        ]);
    }

    /**
     * Displays a single Booking model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Booking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Booking();
		$modelvehicle = new Mstvehicle(); 
		$modelbookinggroups = [new Bookinggroups];
		$searchModel = new BookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		if($model->load(Yii::$app->request->post())) {

         $modelbookinggroups=Model::createMultiple(Bookinggroups::classname());
            Model::loadMultiple($modelbookinggroups, Yii::$app->request->post());
			

	 // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelbookinggroups) && $valid;
       
		
            if (!$valid) {
				$db = Yii::$app->db;
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelbookinggroups as $modelbookinggroups) {
							
                            $modelbookinggroups->B_id = $model->B_id;
							
							
                            if (!($flag = $modelbookinggroups->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
						
                    }
				
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'B_id' => $model->B_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
				}
				
			
        }
		
		 return $this->render('create', [
            'model' => $model,
            'modelbookinggroups' => (empty($modelbookinggroups)) ? [new Bookinggroups] : $modelbookinggroups
        ]);
			
	
        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->B_id]);
			
        }else{
		   return $this->render('create',[
				'model' => $model,	
				'modelvehicle'=>$modelvehicle,
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
    }*/
	}
	
    /**
     * Updates an existing Booking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$modelvehicle =new Mstvehicle();
		$modelvehicle1 =new Mstvehicle(); 
		$model1 =new Booking();
		
		if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelbookinggroups, 'id', 'id');
            $modelbookinggroups = Model::createMultiple(Address::classname(), $modelbookinggroups);
            Model::loadMultiple($modelbookinggroups, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelbookinggroups, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelbookinggroups),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelbookinggroups) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Address::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelbookinggroups as $modelbookinggroups) {
                            $modelbookinggroups->customer_id = $model->id;
                            if (! ($flag = $modelbookinggroups->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
           	'model' => $model,
			'modelvehicle'=>$modelvehicle,
			'modelvehicle1'=>$modelvehicle1,
			'model1'=>$model1,
            'modelbookinggroups' => (empty($modelbookinggroups)) ? [new modelbookinggroups] : $modelbookinggroups
        ]);
    }
	
    

    /**
     * Deletes an existing Booking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	
	public function actionGetavltrailer(){
		$model = new Booking();
		
		$ttype= $_POST['type'];
		 
		$db = Yii::$app->db;
		$user = Yii::$app->user->identity->username;
	  
	  
	     if($ttype!=''){

				$sql = "Select count(*) As travl from mstvehicle where VehicleDesc='$ttype' and Booking_status!='B' "; 
				//print_r($sql);
				//exit();
				
		  }else{
			  
            return false; 
			 
		  }
		
        $trailerdata = $db->createCommand($sql)->queryAll();
		//print_r($trailerdata);
        //return $this->render('_form',['model' => $model,'trailerdata'=>$trailerdata]); 
	     return json_encode($trailerdata);                        
			
	}
		
	public function actionSizebytype(){
		
			$model = new Booking();
			$vtype= $_POST['vtype'];
			
			$db = Yii::$app->db;
			$user = Yii::$app->user->identity->username;
			if($vtype!='' & $vtype=='TR'){
			$sql = "Select DISTINCT  Size from mstvehicle where VehicleType='$vtype'  and Status='A' and Booking_status!='B' and TrailerStatus='Y' and size IS NOT NULL ORDER BY VehicleDesc"; 
		
			}else if($vtype!=''){
				
				$sql = "Select  DISTINCT  Size from mstvehicle where VehicleType='$vtype'  and Status='A' and Booking_status!='B' and size IS NOT NULL ORDER BY VehicleDesc"; 
				
			}else{
				
				return false;
				
			}
			$vehiclesize = $db->createCommand($sql)->queryAll();
			return json_encode($vehiclesize);                        
	
	}
		
	public function actionVechiclesbytype(){
		$model = new Booking();
		
		$size = $_POST['size'];
		$db = Yii::$app->db;
		$user = Yii::$app->user->identity->username;
	    if($size!=''){

		$sql = "Select DISTINCT VehicleDesc from mstvehicle where  Size='$size' and Status='A' and Booking_status!='B' ORDER BY VehicleDesc"; 
			
	
		}else{
			
			return false;
			
		}
		$vehicledesc = $db->createCommand($sql)->queryAll();
		
		//print_r($trailerdata1);
        //return $this->render('_form',['model' => $model,'trailerdata1'=>$trailerdata1]); 
	    return json_encode($vehicledesc);                        
	
	}
	
		public function actionVechiclesbydesc(){
		$model = new Booking();
		
		$type = $_POST['type'];
		$db = Yii::$app->db;
		$user = Yii::$app->user->identity->username;
	    if($size!=''){

		$sql = "Select Count VehicleDesc from mstvehicle where  VehicleDesc='$type' and Status='A' and Booking_status!='B' ORDER BY VehicleDesc"; 
			
	
		}else{
			
			return false;
			
		}
		$vehicledesc = $db->createCommand($sql)->queryAll();
		
		//print_r($trailerdata1);
        //return $this->render('_form',['model' => $model,'trailerdata1'=>$trailerdata1]); 
	    return json_encode($vehicledesc);                        
	
	}
	
	
	
	
	public function actionGetlist(){
		$model = new Booking();
		$tsize= $_POST['size'];
		$ttype= $_POST['type'];
		$avlqty=$_POST['avlqty'];
		$reqqty=$_POST['reqqty'];
		

		$db = Yii::$app->db;
		$user = Yii::$app->user->identity->username;
	  
	    /*if($type =='All') $type = 'AND v.VehicleJobType="All"'; 
	    if($dtype =='Laden')  $type =  'AND v.VehicleJobType="Laden"';
	    if($dtype =='Empty')  $type =  'AND v.VehicleJobType="Empty"'; */
	    if($ttype==''){

			$sql = "Select VehicleRegNo,VehicleType,Size,VehicleDesc,LadenWight,UnLadenWight from mstvehicle where Size='$tsize' and VehicleType='TR' and TrailerStatus='Y' and Booking_status!='B'  ORDER BY VehicleRegNo DESC limit $reqqty"; 
				
		}else if($ttype!=''){
			  
            $sql = "Select VehicleRegNo,VehicleType,Size,VehicleDesc,LadenWight,UnLadenWight from mstvehicle where Size='$tsize' and VehicleDesc='$ttype' and VehicleType='TR' and TrailerStatus='Y' and Booking_status!='B'  ORDER BY VehicleRegNo DESC limit $reqqty" ;
			 
			 
		}
		//print_r($sql);
		//exit();
        $trailerdata1 = $db->createCommand($sql)->queryAll();
		//print_r($trailerdata1);
        //return $this->render('_form',['model' => $model,'trailerdata1'=>$trailerdata1]); 
	    return json_encode($trailerdata1);                        
		 
		 
		
		
	}
	
	
	
	public function actionCreatebooking(){
		$db = Yii::$app->db;
		$model = new Booking();
		
		$user = Yii::$app->user->identity->username;
		$modelvehicle = new Mstvehicle(); 
		$modelbookinggroups = [new Bookinggroups];
		$searchModel = new BookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			
		if($model->load(Yii::$app->request->post())) {
						
		
			$modelbookinggroups=Model::createMultiple(Bookinggroups::classname());
			Model::loadMultiple($modelbookinggroups, Yii::$app->request->post());
		
			$valid = $model->validate();
			$valid = Model::validateMultiple($modelbookinggroups) && $valid;
        
	
            if (!$valid) {
							
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelbookinggroups as $modelbookinggroups) {
							$modelbookinggroups->c_date=CONSTANT::getCurrentTimestampForDB();
							$modelbookinggroups->c_by=$user;
							$modelbookinggroups->bookingref_no="BR".time();
							$arrivaldate = $modelbookinggroups->Arrival_date;
							$fromdate = $modelbookinggroups->Arrival_date;
							$todate = $modelbookinggroups->Arrival_date;
							
							$fromdate = str_replace('/', '-', $fromdate);
							$arrivaldate = str_replace('/', '-', $arrivaldate);
							$todate= str_replace('/', '-', $todate);
							
							$modelbookinggroups->Arrival_date=date('d-m-y', strtotime($arrivaldate));
							$modelbookinggroups->From_date=date('d-m-y', strtotime($fromdate));
							$modelbookinggroups->To_date=date('d-m-y', strtotime($todate));
							$modelbookinggroups->B_id = $model->B_id;
												
							
						if (!($flag = $modelbookinggroups->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
						
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['bookinggroups/view', 'id' => $modelbookinggroups ->id]);
                    }
                } catch (Exception $e) {
					
					 $error = $e->getMessage();
					
					 $transaction->rollBack();
                }
				}else{
					
					echo "failed";
				}
			
        }
		
		 return $this->render('create', [
            'model' => $model,
            'modelbookinggroups' => (empty($modelbookinggroups)) ? [new Bookinggroups] : $modelbookinggroups
        ]);
		
		
		/*$model = new Booking();
		$db = Yii::$app->db;
		$user = Yii::$app->user->identity->username;
		$tsize= $_POST['size'];
		$tmovetype= $_POST['movetype'];
		$ttype= $_POST['type'];
		$vtype=$_POST['vtype'];
		$reqqty=$_POST['reqqty'];
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];
		$arrivaltime=$_POST['arrivaltime'];
		$remark=$_POST['remarks'];
		//$getlast=Yii::$app->db->getLastInsertId();
		$assignedTo=$_POST['assignedTo'];
		$Booking_id= "BR".time();
	
		//$totalinputs=sizeof($assignedTo);   
		if(isset($_POST['assignedTo']))
		{
			$model->VehicleRegNo=$_POST['assignedTo'];
			
			$vehicles=$_POST['assignedTo'];
			
			
			foreach ($assignedTo as $data){
				
			$model = new Booking();
			$model->Movetype=$tmovetype;
			$model->size=$tsize;
			$model->Type=$ttype;
			$model->vehicleType=$vtype;
			$model->bookingref_no=$Booking_id;
			$model->Qty=$reqqty;
			$model->Arrivaltime=$arrivaltime;
			$model->Fromdate= date('Y-m-d H:i:s', strtotime($fromdate));
			$model->Todate=date('Y-m-d H:i:s', strtotime($todate));
			$model->status='A';
			$model->Remarks=$remark;
			$model->C_date=CONSTANT::getCurrentTimestampForDB();
			$model->C_By=$user;
			$model->M_date='';
			$model->M_By='';
			$model->VehicleRegNo=$_POST['assignedTo'];
			$model->VehicleRegNo=$data;
			$model->isNewRecord = true;
			$model->save(false);
			$sql ="Update mstvehicle set Booking_status='B' where vehicleRegNo('$model->VehicleRegNo')";	
			$data = $db->createCommand($sql);
			}
			
			
			$error=array();
			if ($model->save(false)==true){
			
			$bkref=$model->bookingref_no;
			$msg = array("success"=>"everything is ok","ref" =>$bkref);
               
				
			} else {
				
				 $msg = array("error"=>"some error");
				
			}
				echo json_encode($msg);die;
			
			}
		}*/

	
		
	}

}