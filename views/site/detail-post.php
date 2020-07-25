<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\modules\admin\models\Cause;
use \yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\modules\admin\models\Post;
use app\modules\admin\models\Comment;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Post Details';
$this->params['breadcrumbs'][] = $this->title;
if(trim($model->image)	!= ''){
	$image	=	$model->image;
}else{
	$image = 'default.jpg';	
}

$Post	=	Post::find()->limit(2)
						->where(['category'=>$model->category])
						->andwhere("id != $model->id")
						->orderBy(['create_time'=>SORT_DESC])
						->all();



$Comment	=	Comment::find()->limit(10)
						->where(['post_id'=>$model->id])
						->andwhere(['status'=>'Active'])
						->orderBy(['create_time'=>SORT_DESC])
						->all();
						
?>


<div class="container">

    <?php if(Yii::$app->session->hasFlash('commentSubmitted')){?>	

    	<div class="alert alert-success"> <p style="text-align:center"> Thank For Comment on this post. Your comment will visible after approval.<br/>
    																	Click Ok to Continue Reading</p></div>
    	<div align="center" style="margin-bottom:15px"><a href="<?=Yii::getAlias('@web'); ?>/site/detail-post?id=<?=$model->id?>" class="btn btn-info"> Ok </a></div>
    <?php } else {?>
<div class="row" style="margin-top:15px">
 
<div class="col-md-8">
				<div class="row product-info">
				<!-- Left Starts -->
					
					<!-- Product Name Starts -->
						<h2 align="left" >
							<?=$model->title?> 
                        </h2>
					<!-- Product Name Ends -->
						<hr />
					<!-- Manufacturer Starts -->
						<p><?= $model->content ;  ?></p>
					<!-- Manufacturer Ends -->
						<hr />
					<!-- Price Starts -->
						
						
								
							
					
				
						
					 
				
				<!-- Right Ends -->
				</div>
               <div class="product-info-box">
					<h4 class="heading">Comments</h4>
					<div class="content panel-smart">

					<?php foreach ($Comment as $key => $value) {
						?>
						
							
							<div class="row">

							<div class="col-md-6">
								<span ><b> Commented By : </b></span> <?= $value->author ?><br>
							</div>
							<div class="col-md-6">
                            	<span ><b> Commented On : </b></span><?= date('Y-m-d',strtotime($value->create_time)) ?>
                            	</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-md-12">
								<p><?= $value->content ?></p>
								
								
                            	</div>
                            	</div>
                            	<hr/>
                            
						<?php	} ?>

		


    <?php $form = ActiveForm::begin(); ?>

     <div class="row">
     <div class="col-md-12">

    	<?php if(\Yii::$app->user->isGuest){ ?>

<div class="row">
    		<div class="col-md-4">

    	<?= $form->field($comment, 'author')->textInput(['placeHolder'=>'Your Name'])->label(false) ?>
    	</div> 
    	<div class="col-md-4">
    	<?= $form->field($comment, 'email')->textInput(['placeHolder'=>'Your Email'])->label(false) ?> 
    	</div>
    	
       </div>
       <?php } else {  
       	$user =Yii::$app->user->identity;
        ?>
       <div class="row">
    		<div class="col-md-4">

    	<?= $form->field($comment, 'author')->textInput(['value'=>$user->fullname])->label(false) ?>
    	</div> 
    	<div class="col-md-4">
    	<?= $form->field($comment, 'email')->textInput(['value'=>$user->email])->label(false) ?> 
    	</div>
    	
       </div>
       <?php } ?>
       <div class="row">
       <div class="col-md-8">
		<?= $form->field($comment, 'content')->textArea(['rows' => 3])->label(false) ?> 
</div>
</div>
 <div class="row">
       <div class="col-md-8">
        <?= $form->field($comment, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-5">{image}</div><div class="col-lg-7"> {input}</div></div>',

                ])->label('Verification Code') ?> 
		
    </div>
    </div>
     <div class="form-group">
        <?= Html::submitButton('Create', ['class' =>  'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>
						
					</div>
				</div> 
				</div>
				<hr/>

              
                
                
              
				
                
              
					
				
			
   </div>             
     <div class="col-md-4">
			<!-- Categories Links Starts -->
			<div class="image">
			<img src="<?= Yii::getAlias('@web'); ?>/Post/<?=$image ?>" alt="Image" class="img-responsive thumbnail" />	
			</div>

			<br clear="all">

			<hr/>

  <div class="product-info-box">
					<h4 class="heading">Related Post</h4>
			  <div class="row">
                    
                     <?php 	foreach($Post as $v)	{	
			 
			 if($v->image !=	''){
				 $image	=	$v->image;
			 }
			 else{
				 $image	=	'default.jpg';
			 }
				 ?>
				<div class="col-md-6 col-sm-12">
					<div class="product-col">
						<div class="image ">
                       
							<img src="<?= Yii::getAlias('@web'); ?>/Cause/<?=$image?>" alt="product" class="img-responsive " />
                         
						</div>
						<div class="caption" style="min-height:100px">
							<p>
                            <a href="<?=Yii::getAlias('@web'); ?>/site/detail-post?id=<?=$v->id;?>">
								<?= substr($v->title, 0,50) ?>
                            </a>
                            </p>
							
							
						</div>
					</div>
				</div>
                
                 <?php } ?>
                    
                    </div>
                    </div>
	 		
	 	</div>
				
			<!-- Categories Links Ends -->
			
		
			</div>           
<?php } ?>