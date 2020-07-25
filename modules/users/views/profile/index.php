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
						<p><img src="<?= Yii::getAlias('@web'); ?>/ProfilePic/users/<?=$image ?>" alt="Image" class="img-responsive thumbnail" width="200"/>
						</p>
						
					</div>
				<!-- Left Ends -->
				<!-- Right Starts -->
					<div class="col-sm-8">
					<!-- Product Name Starts -->
						<h2 align="left" style="text-transform:capitalize">
						<?= $model->FirstName .' '. $model->LastName; ?>	
                        </h2>
					<!-- Product Name Ends -->
						<hr />
					<!-- Manufacturer Starts -->
						<ul class="list-unstyled manufacturer" style="text-transform:none !important">
						
                           
							<li>
                            	<span>Email:</span> <strong><a><?= $model->Email ?></a></strong>
                            </li>
                            <li>
                            	<span>Address:</span> <?= $model->Address ?>
                            </li>
                            <li>
                            	<span>City:</span>  <?= $model->City ?>
                            </li>
                            <li>
                            	<span>State:</span>  <?= $model->State ?>
                            </li>
                            <li>
                            	<span>Country:</span>   <?= $model->Country ?>
                            </li>
                             <li>
                            	<span>Pincode:</span>   <?= $model->Pincode ?>
                            </li>
						</ul>
					<!-- Manufacturer Ends -->
						<hr />
					
						
					
					</div>
				<!-- Right Ends -->
				</div>
                
                
   </div>             
                <?php include'sidebar.php'; ?>
</div>
</div>
</div>
