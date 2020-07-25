<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\volunteer\models\Volunteer */

$this->title = 'Edit Profile: ' . ' ' . $model->FirstName;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->FirstName, 'url' => ['../profile']];
$this->params['breadcrumbs'][] = 'Edit Profile';


if(trim($model->ProfilePic)	!= ''){
	$image	=	$model->ProfilePic;
}else{
	$image = 'icon-user-default.png';	
}
?>
<div class="container">

  
<div class="row">
<div class="col-md-9">
   <h3 ><?= Html::encode($this->title) ?></h3>
   <hr/>
				<div class="row">
				<!-- Left Starts -->
					<div class="col-sm-4 images-block">
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
					
							<img src="<?= Yii::getAlias('@web'); ?>/ProfilePic/users/<?=$image?>" alt="Image" class="img-responsive thumbnail" width="200" />
						
                       <span class="img-change"><i class="fa fa-camera-retro"></i></span>
                       
         <?= $form->field($model, 'file')->fileInput(['title'=>'Change Image','onchange' => 'getProfile("'.$model->Id.'")'])->label(false) ?>
        
                       <?php ActiveForm::end(); ?>
					</div>
				<!-- Left Ends -->
				<!-- Right Starts -->
					<div class="col-sm-8">
								<?= $this->render('_form', [
                                    'model' => $model,
                                ]) ?>
							</div>
                            </div>
                
                
   </div>             
                 <?php include 'sidebar.php'; ?>
</div>
</div>


<script language="javascript">

// function to get discount amount
function getProfile(id)
{
	$('#w0').attr('action','<?= Yii::getAlias('@web'); ?>/users/profile/profile-pic?id='+id);
	$('#w0').submit();
}

</script>
 <style>
#users-file {
  position: absolute;
  overflow: hidden;
  opacity: 0;
  top: 5px;
  left: 10px;
  width:25%;
}
.img-change{
	position:absolute; 
	top:5px;
	left:10%;
	font-size:20px;
	color: #2d3945;
	}
.img-change:hover{
	cursor:pointer !important;
}
  </style> 
  
