<?php
use app\modules\admin\models\Cause;
use ijackua\sharelinks\ShareLinks;
use \yii\helpers\Html;
use \yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\modules\admin\models\Ngo;
use app\modules\admin\models\Reason;
use  app\modules\admin\models\PrimaryArea;
use  app\modules\admin\models\State;


if(! Yii::$app->user->isGuest){
$user_id =Yii::$app->user->identity->id;

$roles = Yii::$app->authManager->getRolesByUser($user_id);
foreach($roles as $v){
	$role = $v->name;
	}
}
else{
	$role = 'guest';
	}
?>

<style type="text/css">
.fullwidthabanner {
	height: 460px !important;
}

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



	 <section class="rev_slider_wrapper banner-section">
	 	<div style="float: left; width: 30%">
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
		 				<div class="col-sm-12" style="margin-bottom:-30px">
			 				 <div class="form-group" >
        <?= Html::submitButton('Search', ['class' => 'btn btn-success btn-block']) ?>
    </div>
		 				</div>
		 			</div>
		 		</div>
	 		</div>
	 		 <?php ActiveForm::end(); ?>
	 	</div>
        <div class="socialShareBlock">
 
</div>
      <div class="rev_slider banner-slider" style="width: 70%; float: left;">
        <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:460px;"> 
          <!-- START REVOLUTION SLIDER 4.6.5 fullwidth mode -->
          <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:460px;height:460px;">
            <ul>

            	

									              <!-- SLIDE  -->
									              <li class="slide-1 ?>" data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
									                <!-- MAIN IMAGE --> 
									                <img src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/images/Banner-3.jpg"  alt="slide-banner-011"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
									                <!-- LAYERS --> 
									                
									                <!-- LAYER NR. 1 
											                <div class="tp-caption black sft tp-resizeme" 
														 data-x="4" 
														 data-y="70"  
														data-speed="500" 
														data-start="500" 
														data-easing="Circ.easeOut" 
														data-splitin="none" 
														data-splitout="none" 
														data-elementdelay="1" 
														data-endelementdelay="0.1" 
														 data-endspeed="500" 

														style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
														 
														 </div>
														 
														 -->
												                
										                <!-- LAYER NR. 2 -->
										                <div class="tp-caption sft third-style banner-heading banner-title" 
													 data-x="3" 
													 data-y="128"  
													data-speed="800" 
													data-start="800" 
													data-easing="Circ.easeOut" 
													data-splitin="none" 
													data-splitout="none" 
													data-elementdelay="2" 
													data-endelementdelay="0.1" 
													 data-endspeed="800" 

													style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">
										                  <h2>
										                  	<strong>Donate &#038; Help</strong>										                  	Children for Education										                  	 </h2>
										                </div>
										                
										                
									                
									                <!-- LAYER NR. 3 -->
											                <div class="tp-caption black sft tp-resizeme" 
														 data-x="5" 
														 data-y="278"  
														data-speed="1000" 
														data-start="1000" 
														data-easing="Circ.easeOut" 
														data-splitin="none" 
														data-splitout="none" 
														data-elementdelay="1" 
														data-endelementdelay="0.1" 
														 data-end="700" 
											 data-endspeed="300" 

														style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
																									                </div>
											                
											                
											                
									                <!-- LAYER NR. 4 -->
											                <div class="tp-caption black sft tp-resizeme" 
														 data-x="6" 
														 data-y="394"  
														data-speed="1200" 
														data-start="1200" 
														data-easing="Circ.easeOut" 
														data-splitin="none" 
														data-splitout="none" 
														data-elementdelay="1" 
														data-endelementdelay="0.1" 
														 data-endspeed="1200" 

														style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">
														<a data-toggle="modal" href="wp-content/themes/twentyfifteen/donate/index.html" data-id="301" data-target=".donate-form" class="btn btn-default fancybox fancybox.iframe hover ">DONATE NOW</a> 

														</div>
									              </li>


            								

									              <!-- SLIDE  -->
									              <li class="slide-1 ?>" data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
									                <!-- MAIN IMAGE --> 
									                <img src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/images/Banner-1.jpg"  alt="slide-banner-011"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
									                <!-- LAYERS --> 
									                
									                <!-- LAYER NR. 1 
											                <div class="tp-caption black sft tp-resizeme" 
														 data-x="4" 
														 data-y="70"  
														data-speed="500" 
														data-start="500" 
														data-easing="Circ.easeOut" 
														data-splitin="none" 
														data-splitout="none" 
														data-elementdelay="1" 
														data-endelementdelay="0.1" 
														 data-endspeed="500" 

														style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
														 
														 </div>
														 
														 -->
												                
										                <!-- LAYER NR. 2 -->
										                <div class="tp-caption sft third-style banner-heading banner-title" 
													 data-x="3" 
													 data-y="128"  
													data-speed="800" 
													data-start="800" 
													data-easing="Circ.easeOut" 
													data-splitin="none" 
													data-splitout="none" 
													data-elementdelay="2" 
													data-endelementdelay="0.1" 
													 data-endspeed="800" 

													style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">
										                  <h2>
										                  	<strong>Donate &#038; Help</strong>										                  	Children for Education										                  	 </h2>
										                </div>
										                
										                
									                
									                <!-- LAYER NR. 3 -->
											                <div class="tp-caption black sft tp-resizeme" 
														 data-x="5" 
														 data-y="278"  
														data-speed="1000" 
														data-start="1000" 
														data-easing="Circ.easeOut" 
														data-splitin="none" 
														data-splitout="none" 
														data-elementdelay="1" 
														data-endelementdelay="0.1" 
														 data-end="700" 
											 data-endspeed="300" 

														style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
																									                </div>
											                
											                
											                
									                <!-- LAYER NR. 4 -->
											                <div class="tp-caption black sft tp-resizeme" 
														 data-x="6" 
														 data-y="394"  
														data-speed="1200" 
														data-start="1200" 
														data-easing="Circ.easeOut" 
														data-splitin="none" 
														data-splitout="none" 
														data-elementdelay="1" 
														data-endelementdelay="0.1" 
														 data-endspeed="1200" 

														style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">
														<a data-toggle="modal" href="wp-content/themes/twentyfifteen/donate/index.html" data-id="301" data-target=".donate-form" class="btn btn-default fancybox fancybox.iframe hover ">DONATE NOW</a> 

														</div>
									              </li>


            								

									              <!-- SLIDE  -->
									              <li class="slide-1 ?>" data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
									                <!-- MAIN IMAGE --> 
									                <img src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/images/Banner-2.jpg"  alt="slide-banner-011"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
									                <!-- LAYERS --> 
									                
									                <!-- LAYER NR. 1 
											                <div class="tp-caption black sft tp-resizeme" 
														 data-x="4" 
														 data-y="70"  
														data-speed="500" 
														data-start="500" 
														data-easing="Circ.easeOut" 
														data-splitin="none" 
														data-splitout="none" 
														data-elementdelay="1" 
														data-endelementdelay="0.1" 
														 data-endspeed="500" 

														style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
														 
														 </div>
														 
														 -->
												                
										                <!-- LAYER NR. 2 -->
										                <div class="tp-caption sft third-style banner-heading banner-title" 
													 data-x="3" 
													 data-y="128"  
													data-speed="800" 
													data-start="800" 
													data-easing="Circ.easeOut" 
													data-splitin="none" 
													data-splitout="none" 
													data-elementdelay="2" 
													data-endelementdelay="0.1" 
													 data-endspeed="800" 

													style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">
										                  <h2>
										                  	<strong>Donate &#038; Help</strong>										                  	Children for Education 										                  	 </h2>
										                </div>
										                
										                
									                
									                <!-- LAYER NR. 3 -->
											                <div class="tp-caption black sft tp-resizeme" 
														 data-x="5" 
														 data-y="278"  
														data-speed="1000" 
														data-start="1000" 
														data-easing="Circ.easeOut" 
														data-splitin="none" 
														data-splitout="none" 
														data-elementdelay="1" 
														data-endelementdelay="0.1" 
														 data-end="700" 
											 data-endspeed="300" 

														style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
																									                </div>
											                
											                
											                
									                <!-- LAYER NR. 4 -->
											                <div class="tp-caption black sft tp-resizeme" 
														 data-x="6" 
														 data-y="394"  
														data-speed="1200" 
														data-start="1200" 
														data-easing="Circ.easeOut" 
														data-splitin="none" 
														data-splitout="none" 
														data-elementdelay="1" 
														data-endelementdelay="0.1" 
														 data-endspeed="1200" 

														style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">
														<a data-toggle="modal" href="wp-content/themes/twentyfifteen/donate/index.html" data-id="301" data-target=".donate-form" class="btn btn-default fancybox fancybox.iframe hover ">DONATE NOW</a> 

														</div>
									              </li>


            								
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
          </div>
          <style scoped>
.tp-caption.black,.black{color:#000000;text-shadow:none;background-color:transparent;text-decoration:none;border-width:0px;border-color:rgb(0,0,0);border-style:none}
</style>
          <script type="text/javascript">

				/******************************************
					-	PREPARE PLACEHOLDER FOR SLIDER	-
				******************************************/
				

				var setREVStartSize = function() {
					var	tpopt = new Object();
						tpopt.startwidth = 1150;
						tpopt.startheight = 600;
						tpopt.container = jQuery('#rev_slider_1_1');
						tpopt.fullScreen = "off";
						tpopt.forceFullWidth="off";

					tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
				};

				/* CALL PLACEHOLDER */
				setREVStartSize();


				var tpj=jQuery;
				tpj.noConflict();
				var revapi1;

				tpj(document).ready(function() {

				if(tpj('#rev_slider_1_1').revolution == undefined){
					revslider_showDoubleJqueryError('#rev_slider_1_1');
				}else{
				   revapi1 = tpj('#rev_slider_1_1').show().revolution(
					{	
												dottedOverlay:"none",
						delay:9000,
						startwidth:1150,
						startheight:600,
						hideThumbs:200,

						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:3,
						
												
						simplifyAll:"off",

						navigationType:"bullet",
						navigationArrows:"solo",
						navigationStyle:"round",

						touchenabled:"on",
						onHoverStop:"on",
						nextSlideOnWindowFocus:"off",

						swipe_threshold: 0.7,
						swipe_min_touches: 1,
						drag_block_vertical: false,
						
												
												
						keyboardNavigation:"off",

						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:42,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,

						shadow:0,
						fullWidth:"on",
						fullScreen:"off",

												spinner:"spinner0",
												
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,

						shuffle:"off",

						autoHeight:"off",
						forceFullWidth:"off",
						
						
						hideTimerBar:"on",
						hideThumbsOnMobile:"off",
						hideNavDelayOnMobile:1500,
						hideBulletsOnMobile:"off",
						hideArrowsOnMobile:"off",
						hideThumbsUnderResolution:0,

												hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						startWithSlide:0					});



									}
				});	/*ready*/

			</script> 
        </div>
        <!-- END REVOLUTION SLIDER --> </div>
    </section>







    <!-- banner slider End Here --> 
     	 <section class="our-causes">
      <div class="container">
      
      
        <div class="row">
      
      
       
          <div class="col-xs-12">
            <div class="page-header section-header clearfix">
              <h1>You can help lots of people by donating little. <strong>See our causes</strong></h1>
            </div>
            <div class="article-list flexslider article-slider progressbar">
              <ul class="slides">
        
		<?php $Cause = Cause::find()->where(['Featured'=>'Yes'])->all(); 
		
				foreach($Cause as $v){
					if(trim($v['Image']) == ''){
						$image = 'default.jpg';
						
						}else{
							
							$image = $v['Image'];
							}
							
							$per =  ($v['DonationCollected']/$v['DonationRequired'])*100;
							
							if($per > 100){
								$perDon = 100;
								}
								else{
									$perDon =  number_format((float)$per, 2, '.', '');
									}
		?>

                
                            <li>
                                  <div class="items zoom">
                                    <h3 class="h6"><?= $v['CauseTitle'] ?></h3>                                   
                                     <a href="<?= Yii::getAlias('@web'); ?>/site/detail-view?id=<?=$v['CauseId']?>" class="img-thumb">
                                    <figure> 
                                  <img width="600" height="400" src="<?= Yii::getAlias('@web'); ?>/Cause/<?=$image ?>" class="attachment-charity_causes_thumb wp-post-image" alt="<?= $v['Image'] ?>" /> </figure>
                                    </a>
                                    <div class="progress ">
                                      <div class="progress-bar" role="progressbar" data-aria-valuenow="<?= $perDon?>%" data-aria-valuemin="0" data-aria-valuemax="100" style="width:<?= $perDon?>&#37;"> <span class="progress-value"><?= $perDon?>% </span> </div>
                                    </div>
                                    <span class="donation">Donation: 
                                        <span class="value"> &#36;
                                            <?= $v['DonationCollected'] ?><small>/
                                                &#036;<?= $v['DonationRequired'] ?></small> </span> </span>
                                    <p><?= substr($v['CauseDescription'],0,100); ?></p>
                                    <a  class="btn btn-default" onclick="addToCart(<?=$v['CauseId']?>);" style="margin-bottom:5px">DONATE NOW</a> </div>
                               
                                <?=ijackua\sharelinks\ShareLinks::widget([
								    'viewName' => '@app/views/site/shareLinks.php'
																		]);
																		?>
                                                                        
                                                                        
               
               <?php if($role === 'volunteer'){?>
               <span style="float:right">
               <a href="<?= Yii::getAlias('@web'); ?>/volunteer/profile/promote?cause=<?=$v['CauseId']?>&user=<?=$user_id?>" data-method="post">Promote</a>
               </span>
               <?php } ?>
                                </li>

                            
                          <?php } ?>  

                            
                            

                            
                            

                       
                            
                     
                            

                            
                            

                            
                            

                            
                            

                            
                            

                            
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
   
           
        <!-- How To Help Section Start Here -->
    <section class="how-to-help header-one-help">
      <div class="container">
      <div class="row">
      <div class="col-xs-12 ">
      <header class="page-header section-header">
        <h2>How can you help? <strong>See below</strong></h2>
      </header>
      <div class="row help-list">
      <div class="col-xs-12 col-sm-6 col-lg-5">
        <article class="media"> <a class="pull-left warning-icon-box" href="/charity/web/site/about"><img src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/images/media.png" alt="Media"> </a>
          <div class="media-body less-width">
            <h3 class="media-heading">Media</h3>
            <p>Lorem ipsum dolor sit amet consecte tur adipiscisl at dui tempus,dolor sit amet consecte</p>
          </div>
        </article>
        <article class="media"> <a class="pull-left warning-icon-box" href="/charity/web/volunteer/register"><img src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/images/user.png" alt="Become Volunteer"> </a>
          <div class="media-body less-width">
            <h3 class="media-heading">Become Volunteer</h3>
            <p>Consecte tur adipiscing elit ellentesque egestas nisl at dui tempus,dolor sit amet consecte</p>
          </div>
        </article>
        <article class="media"> <a class="pull-left warning-icon-box fancybox fancybox.iframe " href="/charity/web/site/cause"><img src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/images/heart.png" alt="Send Donation"> </a>
          <div class="media-body less-width">
            <h3 class="media-heading">Send Donation</h3>
            <p>Lorem ipsum dolor sit amet consecte tur adipiscisl at dui tempus,dolor sit amet consecte</p>
          </div>
        </article>
      </div>
      <div class="col-xs-12 col-sm-6 col-lg-6 col-lg-offset-1">
      <div class="embed-responsive embed-responsive-16by9">
      	<iframe width="100%" height="100%" src="https://www.youtube.com/embed/HsIzIXLbMes" frameborder="0" allowfullscreen></iframe>
							</div>
					</div>
									</div>

			</div>
		</div>
	</div>
</section>
<!-- How To Help Section End Here testing --> 
	<section class="latest-news ">
      <div class="container">
        <div class="row">
         

          <div class="col-xs-12">
            <header class="page-header section-header clearfix">
              <h2>Latest News</h2>
            </header>
           

            <div class="article-list row">


                
              <div class="items zoom col-xs-12 col-sm-4 charity-latest-news-home-one"> 
                 <figure> <img width="600" height="400" src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/images/blog-pic2-600x400.jpg" class="attachment-charity_causes_thumb wp-post-image" alt="blog-pic" /> </figure>
                 <h3><a href="wp-content/themes/twentyfifteenhendrerit-pellentesque-pellentesque-sed-ultrices-arcu-3/index.html">Hendrerit pellentesque pellentesque sed ultrices arcu</a></h3>
                <span class="date">May 17, 2015</span><span class="posted-in">Posted In  : <a href="wp-content/themes/twentyfifteencategory/news/index.html" rel="category tag">News</a></span>
                <p>lacinia at aliquam vel justo Phasellus felis purus placerat vel augue vitae aliquam tincidunt dolor <a class="more-link btn btn-default" href="news/hendrerit-pellentesque-pellentesque-sed-ultrices-arcu/index.html">READ MORE</a> </p>
              </div>

          
            <div class="items zoom col-xs-12 col-sm-4 charity-latest-news-home-one">
                <section class="img-slider flex-slide flexslider">
                  <ul class="slides">

                       <li> <img src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/images/blog-pic0-600X400.jpg" alt="news" > </li>   <li> <img src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/images/blog-pic1-600X400.jpg" alt="news" > </li>   <li> <img src="<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/images/blog-pic3-600X400.jpg" alt="news" > </li>                   </ul>
                </section>
                <h3>Hendrerit pellentesque pellentesque sed ultrices arcu</h3>                <span class="date">May 17, 2015</span><span class="posted-in">Posted In  : <a href="wp-content/themes/twentyfifteencategory/news/index.html" rel="category tag">News</a></span>
                <p>lacinia at aliquam vel justo Phasellus felis purus placerat vel augue vitae aliquam tincidunt dolor <a class="more-link btn btn-default" href="news/hendrerit-pellentesque-pellentesque-sed-ultrices-arcu-2/index.html">READ MORE</a> </p>
              </div>



          

              <div class="items zoom col-xs-12 col-sm-4 charity-latest-news-home-one">
                <div class="embed-responsive embed-responsive-16by9">  
                                      <iframe width="100%" height="100%" src="https://www.youtube.com/embed/MLgdWqL4Uo8" frameborder="0" allowfullscreen></iframe>             
                  </div>
                <h3><a href="#">Hendrerit pellentesque pellentesque sed ultrices arcu</a></h3>
                <span class="date">May 17, 2015</span><span class="posted-in">Posted In  : <a href="wp-content/themes/twentyfifteencategory/news/index.html" rel="category tag">News</a></span>
                <p>lacinia at aliquam vel justo Phasellus felis purus placerat vel augue vitae aliquam tincidunt dolor <a class="more-link btn btn-default" href="news/hendrerit-pellentesque-pellentesque-sed-ultrices-arcu-3/index.html">READ MORE</a> </p>
              </div>

          

              


            </div>
          </div>
        </div>
      </div>
    </section>
        
    <section class="testimonial parallax" style="background-image: url('img/bg-testimonials1.html')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="testimonial-slider flexslider">
              <ul class="slides">
              	              					

                <li>
                  <div class="slide">
    
                    <h2>Donation Holders say <strong>Read Below</strong></h2>
                    <blockquote>
                    	
                      <p>Morbi dignissim tristique turpis sed sodales. In tincidunt dapibus semper. Nullam non orci eu massa tempus aliquam! Quisque placerat metus at neque aliquam sit amet iaculis</p>
                      <footer> <span>Tony Vedvik</span> <cite>(Head Sales of Sense Technology)</cite> </footer>                     </blockquote>
                  </div>


                </li> 

              					              					

                <li>
                  <div class="slide">
    
                    <h2>Donation Holders say <strong>Read Below</strong></h2>
                    <blockquote>
                    	   <p>Morbi dignissim tristique turpis sed sodales. In tincidunt dapibus semper. Nullam non orci eu massa tempus aliquam! Quisque placerat metus at neque aliquam sit amet iaculis</p>
                      <footer> <span>Jhony Waker</span> <cite>(CEO at NewCompany)</cite> </footer>
                                        </blockquote>
                  </div>


                </li> 

              					              					

                <li>
                  <div class="slide">
    
                    <h2>Donation Holders say <strong>Read Below</strong></h2>
                    <blockquote>
                    	   <p>Morbi dignissim tristique turpis sed sodales. In tincidunt dapibus semper. Nullam non orci eu massa tempus aliquam! Quisque placerat metus at neque aliquam sit amet iaculis</p>
                      <footer> <span>Jhon Doe</span> <cite>(New media of Marketing firm)</cite> </footer>
                                        </blockquote>
                  </div>


                </li> 

              					              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <?php  if (Yii::$app->session->hasFlash('email-not-varified')): ?>
	<script> alert('Your Key Is either not Valid Or already Used');</script>
    
    <?php endif; ?>

    <script>
function addToCart(Id)
{
	

	jQuery.ajax({
		url: "<?=Yii::getAlias('@web'); ?>/site/add2cart?id="+Id,
		success: function(data)
		{
			alert('Cuase is added to cart');
			
		}
	});
}


</script>