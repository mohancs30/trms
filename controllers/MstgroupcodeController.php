<?php

namespace app\controllers;

use Yii;
use app\models\Mstgroupcode;
use app\models\MstgroupcodeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\CONSTANT;
use yii\helpers\AuditHelper;
/**
 * MstgroupcodeController implements the CRUD actions for Mstgroupcode model.
 */
class MstgroupcodeController extends Controller
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
     * Lists all Mstgroupcode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MstgroupcodeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mstgroupcode model.
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
     * Creates a new Mstgroupcode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mstgroupcode();

        if ($model->load(Yii::$app->request->post())) {
                $model->Code= str_replace(' ', '-', $model->Code);
                $model->CBy = Yii::$app->user->identity->username;
                $model->CDate = CONSTANT::getCurrentTimestampForDB();
                if($model->save(FALSE))
                {
                    
                    AuditHelper::Auditgroupcode($model, $user=Yii::$app->user->identity->username, $create='YES');
                }
            return $this->redirect(['create', 'id' => $model->Code]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mstgroupcode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()))
        {
             $model->Code= str_replace(' ', '-', $model->Code);
             $model->MBy = Yii::$app->user->identity->username;
            $model->MDate = CONSTANT::getCurrentTimestampForDB();
            if($model->save(FALSE))
            {
             AuditHelper::Auditgroupcode($model, $user=Yii::$app->user->identity->username, $create='NO');   
            }
            return $this->redirect(['create', 'id' => $model->Code]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
public function actionCodegroupbulkupload()
    {
        $this->layout='otherlayout';
       $model = new Mstgroupcode();
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
                          $groupcode  = explode(",",$data);
                         // echo "<pre>"; print_r($customer); exit();
                          $groupcheck = Mstgroupcode::find()->where(['Code'=>$groupcode[1]])->one();
                                $model = new Mstgroupcode();
                                $model->GroupCodeName = $groupcode[0];
                                $model->Code = $groupcode[1];
                                $model->CodedDesc = $groupcode[2];
                                $model->Status = "A";
                                $model->CDate = CONSTANT::getCurrentTimestampForDB(); 
                                $model->CBy = Yii::$app->user->identity->username;
                                $groupcheck != '' ? $model->update() : $model->save(FALSE);
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
            $file = $path.'/groupcode.csv';
            if(file_exists($file)){
                yii::$app->response->SendFile($file);
            }else{
                echo "File doesn't exist.404 Error.";
               // $this->refresh();
            }
        }
    /**
     * Deletes an existing Mstgroupcode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
         AuditHelper::deleteauditgroupcode($id, $user=Yii::$app->user->identity->username, $create='NO');
        $this->findModel($id)->delete();

        return $this->redirect(['create']);
    }

    /**
     * Finds the Mstgroupcode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Mstgroupcode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mstgroupcode::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
