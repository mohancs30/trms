<?php

namespace app\controllers;

use Yii;
use app\models\Bookinggroups;
use app\models\BookinggroupsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
/**
 * BookinggroupsController implements the CRUD actions for Bookinggroups model.
 */
class BookinggroupsController extends Controller
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
     * Lists all Bookinggroups models.
     * @return mixed
     */
    public function actionIndex()
    {
		$model = new Bookinggroups();
        $searchModel = new BookinggroupsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
	
	    $searchModel = new BookinggroupsSearch();
  	
		$querycollection = new yii\db\Query;
		$queryreturn = new yii\db\Query;
		$dataProviderall = new yii\db\Query;
		$querypending = new yii\db\Query;
		$querycompleted = new yii\db\Query;
		$queryinvoiced = new yii\db\Query;
		$queryrejected = new yii\db\Query;
		
		$querycollection = Bookinggroups::find()->where(['movetype' =>'collection'])->orderBy('id');
		$dataProvidercollection = new ActiveDataProvider(['query' => $querycollection,'pagination' => ['pageSize' => 20,],]);
					
		$queryreturn = Bookinggroups::find()->where(['movetype' =>'return'])->orderBy('id');
		$dataProviderreturn = new ActiveDataProvider(['query' => $queryreturn,'pagination' => ['pageSize' => 20],]);
		
		$queryall = Bookinggroups::find()->orderBy('id');
		$dataProviderall = new ActiveDataProvider(['query' => $queryall,'pagination' => ['pageSize' => 20,],]);
					
		$querypending = Bookinggroups::find()->where(['movetype' =>'return','status' =>'pending'])->orderBy('id');
		$dataProviderpending= new ActiveDataProvider(['query' => $querypending,'pagination' => ['pageSize' => 20,],]);
		
		$querycompleted = Bookinggroups::find()->where(['movetype' =>'collection','status' =>'completed'])->orderBy('id');
		$dataProvidercompleted = new ActiveDataProvider(['query' => $querycompleted,'pagination' => ['pageSize' => 20,],]);
					
		$queryinvoiced = Bookinggroups::find()->where(['movetype' =>'return','status' =>'invoiced'])->orderBy('id');
		$dataProviderinvoiced = new ActiveDataProvider(['query' => $queryinvoiced,'pagination' => ['pageSize' => 20,],]);
		
		$queryrejected = Bookinggroups::find()->where(['movetype' =>'collection','status' =>'rejected'])->orderBy('id');
		$dataProviderrejected = new ActiveDataProvider(['query' => $queryrejected,'pagination' => ['pageSize' => 20,],]);
					
	
		
		
		// get the user records in the current page
			$models = $dataProvider->getModels();
			return $this->render('index',[
				'model' => $model,	
				'searchModel' => $searchModel,
				'dataProvidercompleted' => $dataProvidercompleted,
				'dataProvidercollection' =>$dataProvidercollection,
				'dataProviderreturn' =>$dataProviderreturn,
				'dataProviderall' => $dataProviderall,
				'dataProviderpending' =>$dataProviderpending,
				'dataProviderinvoiced' =>$dataProviderinvoiced,
				'dataProviderrejected' =>$dataProviderrejected,
									
			]);
			
		
		
      
    }

    /**
     * Displays a single Bookinggroups model.
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
     * Creates a new Bookinggroups model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bookinggroups();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bookinggroups model.
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
		 * Deletes an existing Bookinggroups model.
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
		 * Finds the Bookinggroups model based on its primary key value.
		 * If the model is not found, a 404 HTTP exception will be thrown.
		 * @param integer $id
		 * @return Bookinggroups the loaded model
		 * @throws NotFoundHttpException if the model cannot be found
		 */
		protected function findModel($id)
		{
			if (($model = Bookinggroups::findOne($id)) !== null) {
				return $model;
			} else {
				throw new NotFoundHttpException('The requested page does not exist.');
			}
		}
	}
