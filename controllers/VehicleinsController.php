<?php

namespace app\controllers;

use Yii;
use app\models\Vehicleins;
use app\models\VehicleinsSearch;
use app\models\Booking;
use app\models\BookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * VehicleinsController implements the CRUD actions for Vehicleins model.
 */
class VehicleinsController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Vehicleins models.
     * @return mixed
     */
    public function actionIndex()
    {
		
        $searchModel = new VehicleinsSearch();
		$searchModel1 = new Booking();
		$searchModel1 = new BookingSearch();
        $dataProvider= $searchModel->search(Yii::$app->request->queryParams);
		
		
		$querycollection = new yii\db\Query;
		$queryreturn = new yii\db\Query;
		$queryreturn = new yii\db\Query;

		$querypm = Booking::find()->where(['VehicleType' =>'PM'])->orderBy('B_id');
		$dataProviderpm = new ActiveDataProvider(['query' => $querypm,'pagination' => ['pageSize' => 20,],]);
					
		$querytr = Booking::find()->where(['VehicleType' =>'TR'])->orderBy('B_id');
		$dataProvidertr = new ActiveDataProvider(['query' => $querytr,'pagination' => ['pageSize' => 20],]);
		
		$queryall = Booking::find()->orderBy('B_id');
		$dataProviderall = new ActiveDataProvider(['query' => $queryall,'pagination' => ['pageSize' => 20,],]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'dataProviderpm' =>$dataProviderpm,
			'dataProvidertr'=>$dataProvidertr,
			'dataProviderall'=>$dataProviderall,
			
        ]);
		
    }

    /**
     * Displays a single Vehicleins model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		 
        return $this->render('view', [
            'model' => $this->findModel($id),
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Vehicleins model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vehicleins();
		/*$searchModel = new VehicleinsSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
				'searchModel' => $searchModel,
			    'dataProvider' => $dataProvider,
                
            ]);
        }*/
		
			if ($model->load(Yii::$app->request->post())) {
				
			print_r($model->tr_ins_image1);
			exit();
			
			$model->files = UploadedFile::getInstanceByName('files');
			
			//$model->file = UploadedFile::getInstances($model,'file');
			$a=0;
			foreach ($model->files as $file) {
			$a++;
			
			$file->saveAs("images".$a.".".$file->extension);
			$model->image_url="images.".$a.".".$file->extension;
			$model->image_name = "".$a;

			$model->save();
			}

              return $this->render('create', [
                  'model' => $model,
              ]);     
			  
			  
    }
	}

    /**
     * Updates an existing Vehicleins model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Vehicleins model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vehicleins model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vehicleins the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vehicleins::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	
	public function actionTrinspcomp(){
		
		
		
		
	}
	
}
