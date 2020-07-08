<?php

namespace app\controllers;

use Yii;
use app\models\Mstvehicle;
use app\models\MstvehicleSearch;
use app\models\Trxvehicleassign;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\CONSTANT;
//use yii\web\UploadedFile;
/**
 * MstvehicleController implements the CRUD actions for Mstvehicle model.
 */
class MstvehicleController extends Controller
{
    /**
     * @inheritdoc
     */
   /* public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    } */
    
    public function behaviors()
    {
    return [
        'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['create', 'update'],
            'rules' => [
                // allow authenticated users
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
                // everything else is denied
            ],
        ],
    ];
    }

    /**
     * Lists all Mstvehicle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MstvehicleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mstvehicle model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mstvehicle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mstvehicle();
		if ($model->load(Yii::$app->request->post())) {
			//print_r(Yii::$app->request->post());
			//exit();
            $model->VehicleRegNo = str_replace(" ", "", $model->VehicleRegNo);
            $model->VehicleStatus = 'A';
            $model->TrailerStatus = 'N';
            $model->CBy = Yii::$app->user->identity->username;
			$model->CDate = CONSTANT::getCurrentTimestampForDB();        
            $model->save(FALSE);
            return $this->redirect(['create', 'id' => $model->VehicleRegNo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mstvehicle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
     
        if ($model->load(Yii::$app->request->post())) {
            
			//print_r(Yii::$app->request->post());
			//exit();
            //$query = Trxvehicleassign::find()->where(['VehicleRunningStatus'=>'AVL','VehicleRegNo' => $model->VehicleRegNo])->One();
            /*if ($query){
                $model->VehicleStatus = 'Y';
            }*/
            $model->save();
            return $this->redirect(['create', 'id' => $model->VehicleRegNo]);
            
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mstvehicle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['create']);
    }
 public function actionVehicleupload()
    {
        $this->layout='otherlayout';
       $model = new Mstvehicle();
       if ($model->load(Yii::$app->request->post())) {
        $file = UploadedFile::getInstance($model,'file');
                $filename = 'Data.'.$file->extension;
                $upload = $file->saveAs('upload/'.$filename);
                if($upload){
                    define('CSV_PATH','upload/');
                    $csv_file = CSV_PATH . $filename;
                    $filecsv = file($csv_file);
                       //$checkmaster = split(",", $filecsv);
                   // echo "<pre>"; print_r($checkmaster); exit();
                      unset($filecsv[0]);
                      
                      foreach($filecsv as $data){
                          $vehicle  = explode(",",$data);
                         // echo "<pre>"; print_r($vehicle); exit();
                          $vehiclecheck = Mstvehicle::find()->where(['VehicleRegNo'=>$vehicle[0]])->one();
                                $model = new Mstvehicle();
                                $model->VehicleRegNo = $vehicle[0];
                                $model->VehicleDesc = $vehicle[1];
                                //$model->VehicleName = $vehicle[2];
                                $model->VehicleType = $vehicle[2];
                                $model->VehicleEngNo = $vehicle[3];
                                $model->BrandName = $vehicle[4];
                                $model->YearOfMFG = $vehicle[5];
                                $model->MakeModel = $vehicle[6];
                                $model->ChassisNo = $vehicle[7];
                                $model->LadenWight = $vehicle[8];
                                $model->UnLadenWight = $vehicle[9];
                                $model->RoadTaxFrom = CONSTANT::convertScreenDateSlashtoDBDate($vehicle[10]);
                                $model->RoadTaxTo = CONSTANT::convertScreenDateSlashtoDBDate($vehicle[11]);
                                $model->RoadTaxDue = CONSTANT::convertScreenDateSlashtoDBDate($vehicle[12]);
                                $model->InsurFrom = CONSTANT::convertScreenDateSlashtoDBDate($vehicle[13]);
                                $model->InsurTo = CONSTANT::convertScreenDateSlashtoDBDate($vehicle[14]);
                                $model->InsurDue = CONSTANT::convertScreenDateSlashtoDBDate($vehicle[15]);
                                $model->CurrentLocation = $vehicle[16];
                                $model->PermitFrom = CONSTANT::convertScreenDateSlashtoDBDate($vehicle[17]);
                                $model->PermitTo = CONSTANT::convertScreenDateSlashtoDBDate($vehicle[18]);
                                $model->VPCFrom = CONSTANT::convertScreenDateSlashtoDBDate($vehicle[19]);
                                $model->VPCTo = CONSTANT::convertScreenDateSlashtoDBDate($vehicle[20]);
                                $model->ROBDate = CONSTANT::convertScreenDateSlashtoDBDate($vehicle[21]);
                                $model->LoadingCapacity = $vehicle[22];
                                $model->VehicleCondition = $vehicle[23];
                                $model->VehicleStatus = $vehicle[24];
                                $model->IUNo = $vehicle[25];
                                $model->MDTNo = $vehicle[26];
                                $model->UsageType = $vehicle[27];
                                $model->Remark = $vehicle[28];
                                $model->Status = 'A';
                                $model->TrailerStatus = 'N';
                                $model->CDate = CONSTANT::getCurrentTimestampForDB(); 
                                $model->CBy = Yii::$app->user->identity->username;
                                $vehiclecheck != '' ? $model->update() : $model->save(FALSE);

                      }//exit();
                      return $this->render('bulkupload',['model'=>$model,'error'=>'success']);
                } else {
                      return $this->render('bulkupload',['model'=>$model,'error'=>'error']);
                       }
                 }
       return $this->render('bulkupload',['model'=>$model,'error'=>'no']);
    }
     public function actionTemplatedownload()
        {
            $this->layout='otherlayout';
            $path = yii::getAlias('@webroot') . '/files';
            $file = $path.'/vehicle.csv';
            if(file_exists($file)){
                yii::$app->response->SendFile($file);
            }else{
                echo "File doesn't exist.404 Error.";
               // $this->refresh();
            }
        }
    /**
     * Finds the Mstvehicle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Mstvehicle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mstvehicle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
