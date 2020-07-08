<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
	 
	public function beforeAction($action) 
	{ 
    $this->enableCsrfValidation = false; 
    return parent::beforeAction($action); 
	}


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
		$model = new LoginForm();
		if (!\Yii::$app->user->isGuest) {
			
			$this->layout = 'main';
			return $this->render('index');
			
        }
		//return $this->render('index');
       
		
		$this->layout = 'login';
	     return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
		 $model = new LoginForm();
		//$this->layout = 'main';
		//return $this->render('index');
        if (!\Yii::$app->user->isGuest) {
           $this->render('login', [
            'model' => $model,
        ]);
        }

        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
		
            return $this->goBack();
        }
   
      // return $this->redirect($url);
	  $this->layout = 'login';
       return $this->render('login', [
            'model' => $model,
        ]);
    }
		
    

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
		
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
	
	 public function actionVehiclesbooked(){
		 
		$sql = ""; 
		$data = $db->createCommand($sql)->queryAll();
		return json_encode($data);                   
		 
		 
	 }
	
	
	
}
