<?php

namespace app\controllers;

use Yii;
use app\models\Mstuser;
use app\models\MstuserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;  
use Imagine\Image\Box;
use yii\helpers\CONSTANT;
use app\models\Mstemployee;

/**
 * MstuserController implements the CRUD actions for Mstuser model.
 */
class MstuserController extends Controller
{
    /**
     * @inheritdoc
     */
  /*  public function behaviors()
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
     * Lists all Mstuser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MstuserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mstuser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mstuser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mstuser();

        if ($model->load(Yii::$app->request->post())) {
            //get instance of upload file
            $imagename = $model->username;
            $model->file = UploadedFile::getInstance($model, 'file');
			if($model->file){
            $model->file->saveAs('upload/'.$imagename.'.'.$model->file->extension);
            $model->UserImg = 'upload/'.$imagename.'.'.$model->file->extension;
            Image::thumbnail('upload/' .$imagename.'.'.$model->file->extension, 160, 160)
                ->resize(new Box(60,60))
                ->save('upload/' . $imagename.'.'. $model->file->extension, 
                        ['quality' => 70]);
			}
            $model->cDate = CONSTANT::getCurrentTimestampForDB(); 
            $model->cBy = Yii::$app->user->identity->username;;
            if($model->save(FALSE))
            {
                $getemprow = Mstemployee::find()->where(['EmpCode'=>$model->EmpId])->one();
                $getemprow->UserStatus = 'Y';
                $getemprow->update(FALSE);
            }
            return $this->redirect(['create', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mstuser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $imagename = $model->username;
            $model->file = UploadedFile::getInstance($model, 'file');
	   if($model->file){
            $model->file->saveAs('upload/'.$imagename.'.'.$model->file->extension);
            $model->UserImg = 'upload/'.$imagename.'.'.$model->file->extension;
            Image::thumbnail('upload/' .$imagename.'.'.$model->file->extension, 160, 160)
                ->resize(new Box(60,60))
                ->save('upload/' . $imagename.'.'. $model->file->extension, 
                        ['quality' => 70]);
		}
            $model->mDate = CONSTANT::getCurrentTimestampForDB(); 
            $model->mBy = Yii::$app->user->identity->username;
            $model->save(FALSE);
            return $this->redirect(['create', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mstuser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $empid = Mstuser::find()->where(['Id'=>$id])->one();
        $updateid = Mstemployee::find()->where(['EmpCode'=>$empid->EmpId])->one();
        $updateid->UserStatus = 'N';
        if($updateid->update(FALSE))
        {
            $this->findModel($id)->delete();
        }
         //echo "<pre>"; print_r($updateid); exit();
        //echo $id; exit();
//        if($this->findModel($id)->delete())
//        {
//           $empid = Mstuser::find()->where(['Id'=>$id])->one();
//           $updateid = Mstemployee::find()->where(['EmpCode'=>$empid->EmpId])->one();
//           echo "<pre>"; print_r($updateid); exit();
//           $updateid->UserStatus = 'N';
//           $updateid->update(FALSE);
//        }

        return $this->redirect(['create']);
    }

    /**
     * Finds the Mstuser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mstuser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mstuser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
