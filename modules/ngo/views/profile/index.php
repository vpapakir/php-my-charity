<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Profile';
$this->params['breadcrumbs'][] = $this->title;

	if(trim($model->ProfilePic)	!= ''){
	$image	=	$model->ProfilePic;
}else{
	$image = 'icon-user-default.png';	
}
	


?>
<div class="member-index">
 <div class="container">
 
   
<div class="row">
<?php if (Yii::$app->session->hasFlash('passwordchanged')): ?>

    <div class="alert alert-success" style="margin-top:10px; margin-bottom:-5px">
       <p align="center">Your Password has been Changed Successfully.</p>
    </div>
	<?php endif;?>
<div class="col-md-9">
 <h3 ><?= Html::encode($this->title) ?></h3>
   <hr/>
				<div class="row">
				<!-- Left Starts -->
					<div class="col-sm-4 images-block">
						<p><img src="<?= Yii::getAlias('@web'); ?>/ProfilePic/ngo/<?=$image ?>" alt="Image" class="img-responsive thumbnail" width="200"/>
						</p>
						
					</div>
				<!-- Left Ends -->
				<!-- Right Starts -->
					<div class="col-sm-8">
					<!-- Product Name Starts -->
						<h2 align="left" style="text-transform:capitalize">
						<?= $model->NgoName; ?>	
                        </h2>
					<!-- Product Name Ends -->
						<hr />
					<!-- Manufacturer Starts -->
						<ul class="list-unstyled manufacturer" style="text-transform:none !important">
						
                           <li>
                            	<span>Name:</span> <strong><?= $model->FirstName ?></strong>
                            </li>
							<li>
                            	<span>Email:</span> <strong><a><?= $model->Email ?></a></strong>
                            </li>
                            <li>
                            	<span>City:</span>  <?= $model->City ?>
                            </li>
                            <li>
                            	<span>State:</span>  <?= $model->State ?>
                            </li>
						</ul>
					<!-- Manufacturer Ends -->
						<hr />
					<!-- Price Starts -->
						<div>
							<span>Some Text :</span>
							
						</div>
					<!-- Price Ends -->
						<hr />
					<!-- Available Options Starts -->
						
					
					</div>
				<!-- Right Ends -->
				</div>
                
                
   </div>             
                <?php include'sidebar.php'; ?>
</div>
</div>
</div>
<script>
   $(document).ready(function(){
	  
   $('a .list1').each(function(index, value) { 
    if ($(this).prop("href") === window.location.href) {
        $(this).addClass("active");
    } 
});
   });
</script>