<?php

namespace app\controllers;

use Yii;
use app\models\Mstlocation;
use app\models\MstlocationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\CONSTANT;
use yii\helpers\AuditHelper;
/**
 * MstlocationController implements the CRUD actions for Mstlocation model.
 */
class MstlocationController extends Controller
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
     * Lists all Mstlocation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MstlocationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mstlocation model.
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
     * Creates a new Mstlocation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mstlocation();

        if ($model->load(Yii::$app->request->post())) {
            $model->LocCode= str_replace(' ', '-', $model->LocCode);
            
            $count = Mstlocation::find()->Where(['LocCode' => $model->LocCode])->Count();
            if ($count > 0) {
                Yii::$app->session->setFlash('error', "Error: Location Code already exists");
                return $this->render('create', ['model' => $model,]); 
            }
            
            $count = Mstlocation::find()->Where(['LocName' => $model->LocName])->Count();
            if ($count > 0) {
                Yii::$app->session->setFlash('error', "Error: Location Name already exists");
                return $this->render('create', ['model' => $model,]); 
            }
            
            $model->CBy = yii::$app->user->identity->username;
            $model->CDate = CONSTANT::getCurrentTimestampForDB(); 
            if($model->save(FALSE))
            {
                //echo "<pre>"; print_r($model->getPrimaryKey()); exit();
                AuditHelper::Auditlocation($model, $user=Yii::$app->user->identity->username,$create='YES');
               
            }
            return $this->redirect(['create', 'id' => $model->LocCode]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mstlocation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->LocCode= str_replace(' ', '-', $model->LocCode);
            
            $count = Mstlocation::find()->Where(['LocCode' => $model->LocCode])->andWhere(['<>','TableId',$model->TableId])->Count();
            if ($count > 0) {
                Yii::$app->session->setFlash('error', "Error: Location Code already exists");
                return $this->render('update', ['model' => $model,]); 
            }
            
            $count = Mstlocation::find()->Where(['LocName' => $model->LocName])->andWhere(['<>','TableId',$model->TableId])->Count();
            if ($count > 0) {
                Yii::$app->session->setFlash('error', "Error: Location Name already exists");
                return $this->render('update', ['model' => $model,]); 
            }
            
            $model->MBy = yii::$app->user->identity->username;
            $model->MDate = CONSTANT::getCurrentTimestampForDB(); 
            if($model->save(FALSE))
            {
                //echo "<pre>"; print_r($model->getPrimaryKey()); exit();
                AuditHelper::Auditlocation($model, $user=Yii::$app->user->identity->username,$create='NO');
               
            }
            return $this->redirect(['create', 'id' => $model->LocCode]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
public function actionLocationbulkupload()
    {
        $this->layout='otherlayout';
       $model = new Mstlocation();
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
                          $location  = explode(",",$data);
                         // echo "<pre>"; print_r($customer); exit();
                          $loccheck = Mstlocation::find()->where(['LocCode'=>$location[0]])->one();
                                $model = new Mstlocation();
                                $model->LocCode = $location[0];
                                $model->LocName = $location[1];
                                $model->LocSecondName = $location[2];
                                $model->LocType = $location[3];
                                $model->LocGroup = $location[4];
                                $model->Outskirt = $location[5];
                                $model->ContactPerson = $location[6];
                                $model->PhoneNo1 = $location[7];
                                $model->PhoneNo2 = $location[8];
                                $model->MobileNo = $location[9];
                                $model->FaxNo = $location[10];
                                $model->EmailId = $location[11];
                                $model->Address1 = $location[12];
                                $model->Address2 = $location[13];
                                $model->Address3 = $location[14];
                                $model->PostalCode = $location[15];
                                $model->LocStatus = $location[16];
                                $model->Remark = $location[17];
                                $model->CDate = CONSTANT::getCurrentTimestampForDB(); 
                                $model->CBy = Yii::$app->user->identity->username;
                                $loccheck != '' ? $model->update() : $model->save(FALSE);
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
            $file = $path.'/location.csv';
            if(file_exists($file)){
                yii::$app->response->SendFile($file);
            }else{
                echo "File doesn't exist.404 Error.";
               // $this->refresh();
            }
        }
    /**
     * Deletes an existing Mstlocation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
         AuditHelper::deleteauditlocation($id, $user=Yii::$app->user->identity->username, $create='NO');
        $this->findModel($id)->delete();

        return $this->redirect(['create']);
    }

    /**
     * Finds the Mstlocation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Mstlocation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mstlocation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
