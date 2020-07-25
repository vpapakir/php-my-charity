<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php
if(!Yii::$app->user->isGuest){ 
$username = Yii::$app->user->identity->fullname;
$wmsg = "Wellcome ".$username. ' !';
}
else{
	$wmsg = '';
	}
 ?>

  <!--Header Section Start Here -->
  <header id="header">
    <div class="container">
      <div class="row primary-header"> <a href="" class="col-xs-12 col-sm-2 brand" title="Charity">
        <img src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/images/LogoWhite.png" alt="Charity"></a>
      
		<h3 style="color:#FFF;font-size: 22px;display: inline-block;font-family: 'Playfair Display',serif;font-style: italic; position:absolute; left:41%; top:0px"> <?=$wmsg; ?> </h3>
        <div class="social-links col-xs-12 col-sm-10"> 
        <?php if(\Yii::$app->user->isGuest){ ?>
        <a href="<?= Yii::getAlias('@web'); ?>/volunteer/register" class="btn btn-default btn-volunteer">Become volunteer</a>
        <?php } else {
			
			$roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
			foreach($roles as $role){
				if($role->name != 'admin')
				{
					$path = $role->name. '/profile';
				}
				else
				{
					$path = $role->name;
				}
			}
			?>
         <a href="<?= Yii::getAlias('@web'); ?>/<?= $path?>" class="btn btn-default btn-volunteer">My Profile</a>
        	<?php } ?>
          <ul class="soc" style="float:right">
            <li ><a href="http://www.facebook.com/" target="blank" class="soc-facebook"><i class="fa fa-facebook"></i></a></li>
            <li ><a href="http://www.plug.google.com/" target="blank" class="soc-google"><i class="fa fa-google-plus"></i></a></li>
            <li ><a href="http://www.twitter.com/" target="blank" class="soc-facebook"><i class="fa fa-twitter"></i></a></li>
            <li ><a href="http://www.linkedin.com/" target="blank" class="soc-linkedin"><i class="fa fa-linkedin"></i></a></li>


          </ul>

        </div>


      </div>
    </div>
    <div class="navbar navbar-default" role="navigation">
      <div class="container"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
<nav class="menu-header-menu-container">
<ul id="menu-header-menu" class="nav navbar-nav">
<li  class="menu-item"><a href="<?= Yii::getAlias('@web'); ?>/">Home</a></li>
<li class="menu-item menu-item-has-children"><a href="<?= Yii::getAlias('@web'); ?>/site/about">ABOUT US</a>
<div class="dropdown-menu"><ul class="sub-menu menu-odd  menu-depth-1">
	<li class="menu-item "><a href="<?= Yii::getAlias('@web'); ?>/site/what-we-do">WHAT WE DO</a></li>

	<li class="menu-item"><a href="<?= Yii::getAlias('@web'); ?>/site/why-us">WHY US</a></li>
  <li class="menu-item"><a href="<?= Yii::getAlias('@web'); ?>/site/help-us">HOW YOU CAN HELP </a></li>

</ul>
</li>
<li class="menu-item"><a href="<?= Yii::getAlias('@web'); ?>/site/cause">CAUSES</a></li>

<li class="menu-item"><a href="<?= Yii::getAlias('@web'); ?>/ngo/register">NGO</a></li>

<li class="menu-item"><a href="<?= Yii::getAlias('@web'); ?>/site/blog">BLOG</a></li>


<li class="menu-item"><a href="<?= Yii::getAlias('@web'); ?>/site/contact">CONTACT US</a></li>
<li class="menu-item"><a href="<?= Yii::getAlias('@web'); ?>/site/cart">Giving Basket</a></li>
<?php if(\Yii::$app->user->isGuest){ ?>
<li class="menu-item"><a href="<?= Yii::getAlias('@web'); ?>/site/login">Login</a></li>
<?php } else {?>
<li class="menu-item"><a href="<?= Yii::getAlias('@web'); ?>/site/logout">Logout</a></li>
<?php } ?>
<li class="menu-item"><a href="<?= Yii::getAlias('@web'); ?>/site/cause">Donate Now</a></li>

<li class="menu-item"><a href="#">CSR</a></li>
</ul>
</nav> 
         
         
          <form class="navbar-form navbar-right search-form" role="search" method="post" action="#">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search Here" name="ss">
            </div>
            <button type="submit"> <i class="fa fa-search"></i> </button>
          </form>
        </div>
        <!-- /.navbar-collapse --> 
      </div>
      <!-- /.container-fluid --> 
    </div>
  </header>
<style>
  @media screen and (max-width: 800px) {
img{
width: 100%!important;
}
.navbar-toggle {
  display: none;
}

#mc4wp-form-1 p {
    float: left;
    width: 77% !important;
}
#mc4wp-form-1 input {
    border-style: solid;
    border-width: 1px;
}
.newsletter-submit {
    margin-left: 27%;
}
.social-icons.hidden-xs {
  display: block!important;
}
}
</style>
<!-- Header Section End Here --> 
  <!-- Site Content -->
  
  
  
  
  
