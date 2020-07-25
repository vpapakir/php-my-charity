<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\Cause;
use \yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\modules\admin\models\Ngo;
use app\modules\admin\models\Reason;
use  app\modules\admin\models\PrimaryArea;
use  app\modules\admin\models\State;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Details';
$this->params['breadcrumbs'][] = $this->title;
if(trim($model->Image)	!= ''){
	$image	=	$model->Image;
}else{
	$image = 'default.jpg';	
}

$Cause	=	Cause::find()->orderBy(['ApprovedOn'=>SORT_DESC,])
						->limit(4)
						->where(['Reason' => $model->Reason])
						->all();
						
?>

<style>

.row{
	margin:10px !important;
}

</style>

<style type="text/css">


input[type='range'] {
    -webkit-appearance: none !important;
    background:rgb(24, 207, 250);
    height:7px;
}
input[type='range']::-webkit-slider-thumb {
    -webkit-appearance: none !important;
    background:rgb(65, 69, 69);
    height:20px;
    width:10px;
    
}

 section.range-slider {
    position: relative;
   
    height: 35px;
    text-align: center;
    margin-bottom: 25px;
    margin-top: -20px
}

section.range-slider input {
    pointer-events: none;
    position: absolute;
    overflow: hidden;
    left: 0;
    top: 21px;
    width: 100%;
    outline: none;
    height: 18px;
    margin: 0;
    padding: 0;
}

section.range-slider input::-webkit-slider-thumb {
    pointer-events: all;
    position: relative;
    z-index: 1;
    outline: 0;
}

section.range-slider input::-moz-range-thumb {
    pointer-events: all;
    position: relative;
    z-index: 10;
    -moz-appearance: none;
    width: 9px;
}

section.range-slider input::-moz-range-track {
    position: relative;
    z-index: -1;
    background-color: rgba(0, 0, 0, 1);
    border: 0;
}
section.range-slider input:last-of-type::-moz-range-track {
    -moz-appearance: none;
    background: none transparent;
    border: 0;
}
  section.range-slider input[type=range]::-moz-focus-outer {
  border: 0;
}
</style>
<script type="text/javascript">
	function getMinAmt(){

		var minAmt = $('#cause-minamt').val();
		$('#min-amt-prnt').text('INR.'+minAmt);


	}

	function getMaxAmt(){

		var maxAmt = $('#cause-maxamt').val();
		$('#max-amt-prnt').text('INR.'+maxAmt);


	}


</script>
<div class="container">

    
<div class="row">
 <?php if (Yii::$app->session->hasFlash('promoterapply')): ?>

    <div class="alert alert-info">
        You Have successfully applied for promoting this cuase. We will approve your request as soon as possible.
    </div>
    <?php endif ; ?>
    
     <?php if (Yii::$app->session->hasFlash('promoterexist')): ?>

    <div class="alert alert-warning">
        You Have already applied for promoting this cuase.
    </div>
    <?php endif ; ?>
<div class="col-md-8">
				<div class="row product-info">
				<!-- Left Starts -->
					<div class="col-sm-5 images-block">
						<p><img src="<?= Yii::getAlias('@web'); ?>/Cause/<?=$image ?>" alt="Image" class="img-responsive thumbnail" />
						</p>
						
					</div>
				<!-- Left Ends -->
				<!-- Right Starts -->
					<div class="col-sm-7 product-details">
					<!-- Product Name Starts -->
						<h2 align="left" >
							<?=$model->CauseTitle?> 
                        </h2>
					<!-- Product Name Ends -->
						<hr />
					<!-- Manufacturer Starts -->
						<ul class="list-unstyled manufacturer" style="text-transform:none !important">
							<li>
								<span><b> NgoName : </b></span>  <?= $model->ngoName['NgoName'] ?>
							</li>
                            <li>
								<span><b> Reason : </b></span> <?= $model->reason["Reason"] ?>
							</li>
                            <li>
                            	<span><b> Posting Date : </b></span><?= date('Y-m-d',strtotime($model->ApprovedOn)) ?>
                            </li>
                            <li>
                            <span><b> Donation Collected :  </b></span> Rs. <?= $model->DonationCollected ?>
                            </li>
                            <li>
                            <span><b> Min Donation :  </b></span> Rs. <?= $model->MinDonation ?>
                            </li>
						</ul>
					<!-- Manufacturer Ends -->
						<hr />
					<!-- Price Starts -->
						<div>
							<h5><span > Donation Required : </span>
							<span class="price-new"> <b> Rs. <?= $model->DonationRequired; ?> </b></span> 
							</h5>
						</div>
						
								
							
					<!-- Price Ends -->
						<hr />
					<!-- Available Options Starts -->
						<div class="options">
							
							<div class="cart-button button-group">
								
								<button type="button" class="btn btn-primary">
									Donate
									<i class="fa fa-coin"></i> 
								</button>									
							</div>
						</div>
					 
					</div>
				<!-- Right Ends -->
				</div>
               <div class="product-info-box">
					<h4 class="heading">Description</h4>
					<div class="content panel-smart">
						<p>
							<?= $model->CauseDescription; ?>
						</p>
						
					</div>
				</div> 
				<hr/>

                <div class="product-info-box">
					<h4 class="heading">Page Message</h4>
					<div class="content panel-smart">
						<p>
							<?= $model->PageMessage; ?>
						</p>
						
					</div>
				</div>
				<hr/> 
                
                <div class="product-info-box">
					<h4 class="heading">Related Cause</h4>
				
                
                <div class="row">
                    
                     <?php 	foreach($Cause as $v)	{	
			 
			 if($v->Image !=	''){
				 $image	=	$v->Image;
			 }
			 else{
				 $image	=	'default.jpg';
			 }
				 ?>
				<div class="col-md-3 col-sm-6">
					<div class="product-col">
						<div class="image pImg">
                       
							<img src="<?= Yii::getAlias('@web'); ?>/Cause/<?=$image?>" alt="product" class="img-responsive " />
                         
						</div>
						<div class="caption" >
							
							
                            <a href="<?=Yii::getAlias('@web'); ?>/site/detail-view?id=<?=$v->CauseId;?>">
								<?=substr($v->CauseTitle, 0,40) ?>..
                            </a>
                            
							<div>
								<span> Rs. <?=$v->DonationCollected ?></span> / <span>Rs. <?=$v->DonationRequired ?></span>
							</div>
							<div class="cart-button button-group">
                      <a href="<?=Yii::getAlias('@web'); ?>/site/detail-view?id=<?=$v->CauseId;?>" title="View Product" class="btn btn-primary">
									 Donate
								</a>
							
							</div>
						</div>
					</div>
				</div>
                
                 <?php } ?>
                    
                    </div>
					
				<!-- Products Row Ends -->
				</div>
                
   </div>             
     <div class="col-md-4">
			<!-- Categories Links Starts -->
				
	 		 <?php $form = ActiveForm::begin([
       							 	'action' => ['search'],
       								'method' => 'get',
   										 ]); ?>

	 		<div class="col-sm-12" style="background: #EECD46;">
	 			<div class="col-sm-11">
		 			<div class="row" style="margin: 38px 0 37px 25px;">
		 				<div class="col-sm-12">
			 				
			 					 <?= $form->field($model, 'CauseTitle')->textInput(['PLACEHOLDER'=>'Cause Title'])->label(false) ?>
			 				
		 				</div>
		 				<div class="col-sm-12">
			 				
			 					<?php
			 					$ngo = ArrayHelper::map(NGO::find()->all(),'Id','NgoName');

			 					echo $form->field($model, 'NgoName')->dropDownList($ngo,['prompt'=>'Select Ngo'])->label(false) ?>
			 				
			 				
		 				</div>

		 				<div class="col-sm-12">
		 						<section class="range-slider">
  										<span class="rangeValues">
  											<div id="min-amt-prnt" style="width:50%;float:left">INR. 250 </div>

  											<div id="max-amt-prnt" style="width:50%;float:left">INR. 25000 </div>

  										</span>

  										<?= $form->field($model, 'minAmt')->Input('range',['value'=>'250','step'=>'150','min'=>'250','max'=>'25000','onchange'=>'getMinAmt()'])->label(false) ?>
  										<?= $form->field($model, 'maxAmt')->Input('range',['value'=>'25000','step'=>'150','min'=>'250','max'=>'25000','onchange'=>'getMaxAmt()'])->label(false) ?>
  										
								</section>
			 				
			 					
			 				
		 				</div>

		 				<div class="col-sm-12">
			 				
			 					 <?php
			 					 $Reason = ArrayHelper::map(Reason::find()->all(),'ReasonId','Reason');

			 					   echo $form->field($model, 'Reason')->dropDownList($Reason,['prompt'=>'Select Reason'])->label(false) ?>
			 				
		 				</div>

		 				<div class="col-sm-12">
			 				
			 				<?php $State = ArrayHelper::map(State::find()->all(),'StateId','StateName'); ?>

                    		<?= $form->field($model, 'State')->dropdownlist($State,['prompt'=>'Select State'])->label(false) ?>	
			 				
		 				</div>
		 				
		 				<div class="col-sm-12">
			 				
			 				<?php $PrimaryArea = ArrayHelper::map(PrimaryArea::find()->all(),'AreaId','AreaName'); ?>

                    		<?= $form->field($model, 'PrimaryArea')->dropdownlist($PrimaryArea,['prompt'=>'Select Primary Area'])->label(false) ?>	
			 				
		 				</div>
		 				<div class="col-sm-12">
			 				 <div class="form-group" >
        <?= Html::submitButton('Search', ['class' => 'btn btn-success btn-block']) ?>
    </div>
		 				</div>
		 			</div>
		 		</div>
	 		</div>
	 		 <?php ActiveForm::end(); ?>
	 	</div>
				
			<!-- Categories Links Ends -->
			
		
			</div>           
