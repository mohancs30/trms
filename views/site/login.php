<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\DashboardAsset;
use app\models\Mstuser;
use yii\bootstrap\ActiveForm;
use app\models\LoginForm;
//use wadeshuler\sliderrevolution\SliderRevolution;
DashboardAsset::register($this);
//ThemeAsset::register($this);
?>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Login Page | Simple - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App css -->
      
<style>
#login-form label{
text-align: left !important;
}
</style>
    </head>

    <body>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-4 mt-3">
                                    <a href="index.html">
                                        <span><img src="images/allied211.png" alt="" height="70"></span>
                                    </a>

                                </div>
								
                                   <?php $form = ActiveForm::begin(['action' => ['site/login'],
									'id' => 'login-form',
									'layout' => 'horizontal',
									'fieldConfig' => [
										'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
										'labelOptions' => ['class' => 'col-lg-12 control-label'],
									],
									]); ?>

									<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

									<?= $form->field($model, 'password')->passwordInput() ?>
							

									<div class="form-group">
										<div class="col-lg-offset-1 col-lg-11">
											<?= Html::submitButton('Login', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
										</div>
									</div>

								<?php ActiveForm::end(); ?>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                      
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

    

    </body>


<!-- Mirrored from /simple/layouts/horizontal/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Feb 2020 03:25:04 GMT -->
</html>