	<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\DashboardAsset;
DashboardAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<html lang="<?= Yii::$app->language ?>">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->registerCsrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
	<style>
	.navigation-menu li:not(:last-child) {
	border-right: 1px solid white;
	}
	.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('images/pageLoader.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
	}
	</style>
	<script type="text/javascript">
	$(window).load(function() {
		$(".loader").fadeOut("slow");
	});
	</script>
</head>
<?php $this->beginBody() ?>
<body data-layout="horizontal">
<div class="loader"></div>
	<!-- Begin page -->
	<div id="wrapper" style="overflow:auto;">
	<!-- Navigation Bar-->
		<header id="topnav">
		<!-- Topbar Start -->
		<div class="navbar-custom">
				<div class="container-fluid">
					<ul class="list-unstyled topnav-menu float-right mb-0">
						<li class="dropdown notification-list">
						<!-- Mobile menu toggle-->
							<a class="navbar-toggle nav-link">
								<div class="lines">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</a>
						<!-- End mobile menu toggle-->
						</li>
					<li class="dropdown notification-list">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<i class="mdi mdi-bell noti-icon"></i>
							<span class="badge badge-danger rounded-circle noti-icon-badge">4</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-lg">

							<!-- item-->
							<div class="dropdown-item noti-title">
								<h5 class="font-16 m-0">
									<span class="float-right">
									<a href="#" class="text-dark">
									<small>Clear All</small>
									</a>
									</span>Notification
								</h5>
							</div>

							<div class="slimscroll noti-scroll">

								<!-- item-->
								<a href="javascript:void(0);" class="dropdown-item notify-item">
									<div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
										<p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
								</a>

								<!-- item-->
								<a href="javascript:void(0);" class="dropdown-item notify-item">
									<div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
										<p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>
								</a>

								<!-- item-->
								<a href="javascript:void(0);" class="dropdown-item notify-item">
									<div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
										<p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days ago</small></p>
								</a>

								<!-- item-->
								<a href="javascript:void(0);" class="dropdown-item notify-item">
									<div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i></div>
										<p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
								</a>

								<!-- item-->
								<a href="javascript:void(0);" class="dropdown-item notify-item">
									<div class="notify-icon bg-primary">
										<i class="mdi mdi-heart"></i>
									</div>
									<p class="notify-details">Carlos Crouch liked <b>Admin</b>
										<small class="text-muted">13 days ago</small>
									</p>
								</a>
							</div>

							<!-- All-->
							<a href="javascript:void(0);" class="dropdown-item text-primary text-center notify-item notify-all">
							View all
							<i class="fi-arrow-right"></i>
							</a>

						</div>
					</li>
					<li class="dropdown notification-list">
						<a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							
							<span class="pro-user-name d-none d-xl-inline-block ml-2">
							<?php

							if ( Yii::$app->user->isGuest )
							return Yii::$app->getResponse()->redirect(array(Url::to(['site/login'],302)));

							print_r(Yii::$app->user->identity->username); ?>  <i class="mdi mdi-chevron-down"></i> 
							
							<img src="images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
						<!-- item-->

						<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
							<i class="mdi mdi-account-outline"></i>
							<span>Profile</span>
							</a>

						<!-- item-->

						<div class="dropdown-divider"></div>

						<!-- item-->
							<a href="index.php?r=site/logout" data-method="post"  class="dropdown-item notify-item">
							<i class="mdi mdi-logout-variant"></i>
							<span>Logout</span>
							</a>

						</div>
					</li>
					</ul>
				<!-- LOGO -->
				<div class="logo-box">
					<a href="index.html" class="logo text-center">
						<span class="logo-lg">
						<img src="images/allied211.png" alt="" height="70">
						<!-- <span class="logo-lg-text-light">Simple</span> -->
						</span>
						<span class="logo-sm">
						<!-- <span class="logo-sm-text-dark">S</span> -->
						<img src="images/allied211.png" alt="" height="68">
						</span>
					</a>
				</div>

				<div id="navigation">
					<!-- Navigation Menu-->
					<ul class="navigation-menu">

						<li class="has-submenu">
							<a href="index.php?r=site">
							<i class="ti-home"></i>Dashboard
							</a>
						</li>
						<li class="has-submenu">
							<a href="index.php?r=booking">
							<i class="mdi mdi-file-document-box-plus"></i>Booking & Enquiry<div class="arrow-down"></div>
							</a>
							<ul class="submenu">
								<li><a href="index.php?r=booking/create">Creat Booking</a></li>
								<li><a href="index.php?r=bookinggroups">Booking Details</a></li>
								
							</ul>
								
						</li>

						<li class="has-submenu">
							<a href="#"> <i class="mdi mdi-account-cash-outline"></i>Maintenance<div class="arrow-down"></div></a>
							<ul class="submenu">
								<li><a href="index.php?r=fuel">Fuel Records</a></li>
								<!--<li class="has-submenu"><a href="#">Stocks<div class="arrow-down"></div></a>
										<ul class="submenu">
										<li><a href="index.php?r=stock">Stock Purchases</a></li>
										<li><a href="#">Stock Purchases</a></li>
										<li><a href="#">Stock Issues</a></li>
										<li><a href="#">Removals</a></li>
										<li><a href="#">Disposals</a></li>
										</ul>	
								</li>-->
								<!--<li class="has-submenu"><a href="#">Rebuilt Tyres<div class="arrow-down"></div></a>
									<ul class="submenu">
										<li><a href="#">Tyre Removals</a></li>
										<li><a href="#">Send to Rebuild</a></li>
										
									</ul>	
								</li>-->
								<li class="has-submenu"><a href="#">Repairs<div class="arrow-down"></div></a>
							
								<ul class="submenu">
										<li><a href="#">General Repair</a></li>
										<li><a href="#">Accident Repair</a></li>
										
								</ul>	
								</li>
								<!--<li><a href="#">Regular Maint</a></li>-->
								
								
							</ul>	
						</li>

						<li class="has-submenu">
							<a href="#">
							<i class=" mdi mdi-book-information-variant"></i>Finance
							</a>
						</li>

						<li class="has-submenu">
							<a href="">
								<i class="mdi mdi-truck"></i>Vehicle<div class="arrow-down"></div></a>
								<ul class="submenu">
								<li><a href="index.php?r=mstvehicle/create">Creat Vehicle</a></li>
								<li><a href="index.php?r=mstvehicle">Vehicle list</a></li>
								<li><a href="index.php?r=vehicleins">Inspection</a></li>
								
								</ul>
								
						</li>

						<li class="has-submenu">
							<a href="#"> <i class="mdi mdi-account-cash-outline"></i>Admin<div class="arrow-down"></div></a>
							<ul class="submenu">
								<!--<li class="has-submenu">
								<a href="#">Inventory <div class="arrow-down"></div></a>
								<ul class="submenu">
									<li><a href="index.php?r=trxjobplanning/planningboardcommon">Trailer </a></li>
									<li><a href="index.php?r=trxjobplanning/planningboardcommon">Truck </a></li>
									<li><a href="index.php?r=trxjobplanning/planningboardcommon">ERI</a></li>
								</ul>-->
								<li><a href="index.php?r=mstemployee">Employee</a></li>
								<li><a href="index.php?r=mstcustomer">Customer</a></li>
								<li><a href="index.php?r=mstemployee">Users</a></li>
								<li><a href="index.php?r=mstcharges">Charges</a></li>
								<li><a href="index.php?r=stock">Inventory</a></li>
								<li class="has-submenu"><a href="#">Renewals<div class="arrow-down"></div></a>
								<ul class="submenu">
								<li><a href="#">Insurance Payments</a></li>
								<li><a href="#">Other Renewals</a></li></li>
								</ul>
								<li><a href="#">Accident Records</a></li>
								<li><a href="#">Insurance Claims</a></li>
								<li><a href="#">Mail Config</a></li>
							</ul>	
						</li>


						<li class="has-submenu">
							<a href="#">
							<i class="mdi mdi-file-multiple-outline"></i>Reports<div class="arrow-down"></div></a>
							<ul class="submenu">
								<!--<li><a href="#">Fuel Report</a></li>
								<li><a href="#">Maintenance Records</a></li>
								<li><a href="#">Stock Movement</a></li>
								<li><a href="#">Accident Report</a></li>-->
								<li><a href="#">Admin</a></li>
								<li><a href="#">Finance</a></li>
								
							</ul>	
						</li>


					</ul>
					<!-- End navigation menu -->

					<div class="clearfix"></div>
				</div>
			<!-- end #navigation -->

			<div class="clearfix"></div>
			</div>
		</div>
		<!-- end Topbar -->
		</header>
		<!-- End Navigation Bar-->

	<!-- ============================================================== -->
	<!-- Start Page Content here -->


	<div class="content-page">
		<div class="content">

			<!-- Start container-fluid -->
			<div class="container-fluid">
			<?php echo $content ?>

			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end content -->

	</div>

	<!-- END content-page -->

	<!-- ============================================================== -->
	<!-- Footer Start -->
	<footer class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				© Copyright <?php echo date("Y");?> by Allied Container Services Pte Ltd.</div>
			</div>
		</div>
	</footer>
	<!-- end Footer -->
</div>
<!-- end content -->

<?php $this->endBody() ?>
</body>
<?php $this->endPage() ?>
</html>






