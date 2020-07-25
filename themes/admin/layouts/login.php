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
     <?php $this->head() ?>
     <link rel="stylesheet" type="text/css" id="theme" href="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/css/theme-default.css"/>
</head>
<body>

<?php $this->beginBody() ?>
<div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo">Charity</div>
                <?= $content ?>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2010-<?= date('y'); ?> <a href="http://ptindia.org" target="_blank">PARI Technologies India</a>
                    </div>
                </div>
            </div>
            
        </div>
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/jquery/jquery.min.js"></script>

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
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/plugins.js"></script>        
        <script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/../themes/admin/layouts/js/actions.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         

</body>
</html>
