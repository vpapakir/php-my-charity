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
         <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/jquery/jquery.min.js"></script>       
     <?php //$this->head() ?>
     <link rel="stylesheet" type="text/css" id="theme" href="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/css/theme-default.css"/>
</head>
<body>

<?php $this->beginBody() ?>
<div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION page-navigation-toggled x-navigation-hover -->
                <ul class="x-navigation">
                    <li class="xn-" style="text-align:center;">
                        <a href="<?= Yii::getAlias('@web'); ?>" style="font-size:20px;">Charity</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/assets/images/users/avatar.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/assets/images/users/avatar.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name" style="text-transform:capitalize"><?= Yii::$app->user->identity->username; ?></div>
                                <div class="profile-data-title">Director/ Administrator</div>
                            </div>
                            <div class="profile-controls">
                            <?php  $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
		foreach($roles as $role){
		$path = $role->name;
		
		 ?>
                                <a href="<?= Yii::getAlias('@web'); ?>/<?=$path ?>" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="<?= Yii::getAlias('@web'); ?>/<?=$path ?>" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                                
                               
                            </div>
                            
                        </div> 
                         <a href="<?= Yii::getAlias('@web'); ?>/<?=$path ?>" style="font-size:24px; text-align:center">DashBoard</a>                           <?php } ?>                                             
                    </li>
                    <?php include 'menu.php'; ?>
                    </ul>
                   
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- END SEARCH -->                    
                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="<?=Yii::getAlias('@web'); ?>/index.php/site/logout" data-method='post'><span class="fa fa-power-off"></span></a>
                    </li> 
                   
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->
		<div class="page-content-wrap">

            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
        </div>
   </div>
       

<?php $this->endBody() ?>
<?php $this->endPage() ?>
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/morris/morris.min.js"></script>       
        <script type='text/javascript' src='<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/bootstrap/bootstrap-datepicker.js'></script>              
        <script type='text/javascript' src='<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/bootstrap/bootstrap-select.js'></script>              
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/tableexport/tableExport.js"></script>
		<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/tableexport/jquery.base64.js"></script>
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/tableexport/html2canvas.js"></script>
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/tableexport/jspdf/jspdf.js"></script>
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/tableexport/jspdf/libs/base64.js"></script>        
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins.js"></script>        
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/actions.js"></script>
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/demo_charts_morris.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         

</body>
</html>
