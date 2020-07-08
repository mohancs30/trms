<?php
/**
 * @link http://www.yiiframework.com/
* @copyright Copyright (c) 2008 Yii Software LLC
* @license http://www.yiiframework.com/license/
*/
namespace app\assets;
use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DashboardAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
			//'css/site.css',
			//'css/jquery.gritter.css',
			//'css/ganttchart.css',
			'css/bootstrap-datepicker3.css',
			'css/bootstrap.min.css',
			'css/icons.min.css',
			//'css/maruti-media.css',
			//'css/uniform.css',
			'css/app.min.css',
			/*'css/maruti-media.css',
			'css/fullcalendar.css',
			'css/maruti-style.css',
			'css/select2.css',
			'css/maruti-login.css'	
			'css/multiselect.css',
			'css/jquery.dataTables.min.css',
			'css/buttons.dataTables.min.css',*/
	];
	public $js = [
	
			
			'js/app.min.js',
			'js/pages/dashboard.init.js',
			'js/datepicker.min.js',
			'js/bootstrap.min.js',
			'js/select2.min.js',
			'code.jquery.com/jquery-3.2.1.slim.min.js',
            'cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js',
			'maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js', 
			/*'js/fullcalendar.min.js',
			'js/maruti.chat.js',
			'js/bootstrap.min.js',
			'js/jquery-ui.min.js',
			'js/jquery.min.js',
			'js/maruti.js',
			'js/maruti.dashboard.js',
			'js//jquery.flot.min.js',
			'js/jquery.flot.resize.min.js',
			'js/jquery.peity.min.js',
			'js/maruti.login.js',
			//'//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
			/*'plugins/jquery.sparkline.min.js',
			//'plugins/bootstrap-datepicker.js',
			'plugins/jquery.slimscroll.min.js',
			'plugins/fastclick.min.js',
	       'js/app.min.js',
			'js/main.js',
			'js/Chart.min.js',
			'js/multiselect.js',
			'js/jquery-1.12.4.js',
			'js/jquery.dataTables.min.js',
			'js/dataTables.buttons.min.js',
			'js/buttons.flash.min.js',
			'js/pdfmake.min.js',
			'js/buttons.print.min.js',
			'js/TFileSaver.min.js',
			'js/Thtml2canvas.min.js',
			'js/Tjspdf.min.js',
			'js/Tjspdf.plugin.autotable.js',
			'js/TtableExport.min.js',
			'js/Txlsx.core.min.js',
			'js/angular-dragdrop.min.js',
			'js/jquery.slimscroll.js',
			'js/app.js',
			'js/truck.js',*/
	];
	public $depends = [
			'yii\web\YiiAsset',
			'yii\bootstrap\BootstrapAsset',
	];
}
?>