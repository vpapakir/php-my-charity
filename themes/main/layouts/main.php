<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
     <?php //$this->head() ?>
     <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/js/fZBRDoMwCEAvpOv82X1aikpSwRRM19tPjR9L7PZH8t4jBJh9JquurD0xpC2iOlB10etMIKyPhbiDHxZGMsmn8nRWkK2ONBoiuwkZ87nha7xZajVhNzjGognNMDvdgkKm1Ugurjv" media="all" />

 <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/css/bootstrap.css" media="all" />
 <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/css/bootstrap-theme.css" media="all" />
 <link href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
 <link href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/css/chy-style.css" type="text/css" rel="stylesheet">
 <link href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/css/fancybox.css" type="text/css" rel="stylesheet">

<link href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/css/global.css" type="text/css" rel="stylesheet">
<link href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/css/responsive.css" type="text/css" rel="stylesheet">
<link href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/css/settings1dc61dc6.css" type="text/css" rel="stylesheet">
<link href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/css/skin.css" type="text/css" rel="stylesheet">

<link href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/css/genericons/genericonscf1b.css" type="text/css" rel="stylesheet">

<link href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/css/owl.carousel.css" type="text/css" rel="stylesheet">
<link href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/css/owl.theme.css" type="text/css" rel="stylesheet">

<link href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/css/style.css" type="text/css" rel="stylesheet">



 <link rel='stylesheet' id='chy.fonts-css'  href='http://fonts.googleapis.com/css?family=Lato:400,300italic,300,700%7CPlayfair+Display:400,700italic%7CRoboto:300%7CMontserrat:400,700%7COpen+Sans:400,300%7CLibre+Baskerville:400,400italic' type='text/css' media='all' />
     <style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
.help-block{
	padding: 0px;
}
</style>
<script src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/js/jquery-1.11.3.min.js"></script>


<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/js/S85ILMosqdQvL9DNzEvOKU1JLdbPAqLC0tSiSiilk0yEIt3czPSixJJUvdzMPB0D_ZLy1LySyrTMtJLU1DwMxZYGaZYEFSGbaGhqboZbg25ZYk5mSmJJZn4eVEQPKgLWbJFoagI"></script>


<style>#responsive-menu .appendLink, #responsive-menu .responsive-menu li a, #responsive-menu #responsive-menu-title a,#responsive-menu .responsive-menu, #responsive-menu div, #responsive-menu .responsive-menu li, #responsive-menu{box-sizing: content-box !important;-moz-box-sizing: content-box !important;-webkit-box-sizing: content-box !important;-o-box-sizing: content-box !important}.RMPushOpen{width: 100% !important;overflow-x: hidden !important;height: 100% !important}.RMPushSlide{position: relative;bottom: -100%}#responsive-menu{position: fixed;overflow-y: auto;bottom: 0px;width: 75%;bottom: -75%;top: 100%;background: #43494C;z-index: 9999;box-shadow: 0px 1px 8px #333333;font-size: 13px !important;max-width: 999px;display: none}#responsive-menu.admin-bar-showing{padding-top: 32px}#click-menu.admin-bar-showing{margin-top: 32px}#responsive-menu #rm-additional-content{padding: 10px 5% !important;width: 90% !important;color: #FFFFFF}#responsive-menu .appendLink{right: 0px !important;position: absolute !important;border: 1px solid #3C3C3C !important;padding: 12px 10px !important;color: #FFFFFF !important;background: #43494C !important;height: 20px !important;line-height: 20px !important;border-right: 0px !important}#responsive-menu .appendLink:hover{cursor: pointer;background: #3C3C3C !important;color: #FFFFFF !important}#responsive-menu .responsive-menu, #responsive-menu div, #responsive-menu .responsive-menu li,#responsive-menu{text-align: left !important}#responsive-menu .RMImage{vertical-align: middle;margin-right: 10px;display: inline-block}#responsive-menu.RMOpened{bottom: 0px}#responsive-menu,#responsive-menu input{}#responsive-menu #responsive-menu-title{width: 95% !important;font-size: 14px !important;padding: 20px 0px 20px 5% !important;margin-left: 0px !important;background: #43494C !important;white-space: nowrap !important}#responsive-menu #responsive-menu-title,#responsive-menu #responsive-menu-title a{color: #FFFFFF !important;text-decoration: none !important;overflow: hidden !important}#responsive-menu #responsive-menu-title a:hover{color: #FFFFFF !important;text-decoration: none !important}#responsive-menu .appendLink,#responsive-menu .responsive-menu li a,#responsive-menu #responsive-menu-title a{transition: 1s all;-webkit-transition: 1s all;-moz-transition: 1s all;-o-transition: 1s all}#responsive-menu .responsive-menu{width: 100% !important;list-style-type: none !important;margin: 0px !important}#responsive-menu .responsive-menu li.current-menu-item > a,#responsive-menu .responsive-menu li.current-menu-item > .appendLink,#responsive-menu .responsive-menu li.current_page_item > a,#responsive-menu .responsive-menu li.current_page_item > .appendLink{background: #43494C !important;color: #FFFFFF !important}#responsive-menu .responsive-menu li.current-menu-item > a:hover,#responsive-menu .responsive-menu li.current-menu-item > .appendLink:hover,#responsive-menu .responsive-menu li.current_page_item > a:hover,#responsive-menu .responsive-menu li.current_page_item > .appendLink:hover{background: #43494C !important;color: #FFFFFF !important}#responsive-menu.responsive-menu ul{margin-left: 0px !important}#responsive-menu .responsive-menu li{list-style-type: none !important;position: relative !important}#responsive-menu .responsive-menu ul li:last-child{padding-bottom: 0px !important}#responsive-menu .responsive-menu li a{padding: 12px 0px 12px 5% !important;width: 95% !important;display: block !important;height: 20px !important;line-height: 20px !important;overflow: hidden !important;white-space: nowrap !important;color: #FFFFFF !important;border-top: 1px solid #3C3C3C !important;text-decoration: none !important}#click-menu{text-align: center;cursor: pointer;font-size: 13px !important;display: none;position: fixed;right: 5%;top: 10px;color: #FFFFFF;background: #ecc731;padding: 5px;z-index: 9999}#responsive-menu #responsiveSearch{display: block !important;width: 95% !important;padding-left: 5% !important;border-top: 1px solid #3C3C3C !important;clear: both !important;padding-top: 10px !important;padding-bottom: 10px !important;height: 40px !important;line-height: 40px !important}#responsive-menu #responsiveSearchSubmit{display: none !important}#responsive-menu #responsiveSearchInput{width: 91% !important;padding: 5px 0px 5px 3% !important;-webkit-appearance: none !important;border-radius: 2px !important;border: 1px solid #3C3C3C !important}#responsive-menu .responsive-menu,#responsive-menu div,#responsive-menu .responsive-menu li{width: 100% !important;margin-left: 0px !important;padding-left: 0px !important}#responsive-menu .responsive-menu li li a{padding-left: 10% !important;width: 90% !important;overflow: hidden !important}#responsive-menu .responsive-menu li li li a{padding-left: 15% !important;width: 85% !important;overflow: hidden !important}#responsive-menu .responsive-menu li li li li a{padding-left: 20% !important;width: 80% !important;overflow: hidden !important}#responsive-menu .responsive-menu li li li li li a{padding-left: 25% !important;width: 75% !important;overflow: hidden !important}#responsive-menu .responsive-menu li a:hover{background: #3C3C3C !important;color: #FFFFFF !important;list-style-type: none !important;text-decoration: none !important}#click-menu #RMX{display: none;font-size: 24px;line-height: 27px !important;height: 27px !important;color: #FFFFFF !important}#click-menu .threeLines{width: 33px !important;height: 27px !important;margin: auto !important}#click-menu .threeLines .line{height: 5px !important;margin-bottom: 6px !important;background: #FFFFFF !important;width: 100% !important}#click-menu .threeLines .line.last{margin-bottom: 0px !important}@media only screen and ( min-width : 0px ) and ( max-width : 700px ){#click-menu{display: block}#responsive-menu .responsive-menu li li .appendLink,#responsive-menu .responsive-menu li li li{display: none !important}}</style>	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>


<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/js/nczBDYAgDADAhZTix4WgSAm0CEXD9vpxAf-Xs6A3ss5AQREZGl49k8cGra81j4MYUod0DmzTaMSCdbCLRkVyN4V4825f7N_mhZKHkvB3PQ.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function() {
				// CUSTOM AJAX CONTENT LOADING FUNCTION
				var ajaxRevslider = function(obj) {
				
					// obj.type : Post Type
					// obj.id : ID of Content to Load
					// obj.aspectratio : The Aspect Ratio of the Container / Media
					// obj.selector : The Container Selector where the Content of Ajax will be injected. It is done via the Essential Grid on Return of Content
					
					var content = "";

					data = {};
					
					data.action = 'revslider_ajax_call_front';
					data.client_action = 'get_slider_html';
					data.token = 'd835dc2cf1';
					data.type = obj.type;
					data.id = obj.id;
					data.aspectratio = obj.aspectratio;
					
					// SYNC AJAX REQUEST
					jQuery.ajax({
						type:"post",
						url:"",
						dataType: 'json',
						data:data,
						async:false,
						success: function(ret, textStatus, XMLHttpRequest) {
							if(ret.success == true)
								content = ret.data;								
						},
						error: function(e) {
							console.log(e);
						}
					});
					
					 // FIRST RETURN THE CONTENT WHEN IT IS LOADED !!
					 return content;						 
				};
				
				// CUSTOM AJAX FUNCTION TO REMOVE THE SLIDER
				var ajaxRemoveRevslider = function(obj) {
					return jQuery(obj.selector+" .rev_slider").revkill();
				};

				// EXTEND THE AJAX CONTENT LOADING TYPES WITH TYPE AND FUNCTION
				var extendessential = setInterval(function() {
					if (jQuery.fn.tpessential != undefined) {
						clearInterval(extendessential);
						if(typeof(jQuery.fn.tpessential.defaults) !== 'undefined') {
							jQuery.fn.tpessential.defaults.ajaxTypes.push({type:"revslider",func:ajaxRevslider,killfunc:ajaxRemoveRevslider,openAnimationSpeed:0.3});   
							// type:  Name of the Post to load via Ajax into the Essential Grid Ajax Container
							// func: the Function Name which is Called once the Item with the Post Type has been clicked
							// killfunc: function to kill in case the Ajax Window going to be removed (before Remove function !
							// openAnimationSpeed: how quick the Ajax Content window should be animated (default is 0.3)
						}
					}
				},30);
			});
		</script>
<link rel="shortcut icon" type="image/x-icon" href="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/favicon-1.ico"  />
<style type="text/css">
.mc4wp-form input[name="_mc4wp_required_but_not_really"] ,#fancybox-loading{
	display: none !important;
}
</style>
<script type="text/javascript">
/* <![CDATA[ */
var charityCustom = {"countdown":"April 16, 2015 12:00:00"};
/* ]]> */
</script> 
<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/js/M9AvKU_NK6lMy0wrSU3N008sLk4tKdbPKtYvL9BLLi0uyc_VMcCppjizJBUA.js"></script>
<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/js/snap.svg-min.js"></script>
</head>
<body>

<?php $this->beginBody() ?>
<div id="wrapper" class="full-width"> 

<? include('header.php');?>

  <div id="main"> 
   <?= $content ?>
       </div>


 <? include('footer.php');?>
 
 <?php $this->endBody() ?>
 </body>

<?php $this->endPage() ?>
</html>