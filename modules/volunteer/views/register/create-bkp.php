<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\volunteer\models\Volunteer */

$this->title = 'Register Volunteer';
$this->params['breadcrumbs'][] = ['label' => 'Volunteers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
.col-sm-offset-3 {
  margin-left: 10%;
}

.form-control{
	width: 160%;
}

</style>




<div id="main">		
    
         
         <div class="breadcrumb-section" style="background-image:url(
              http://ameriteckwebservices.net/charity/wp-content/uploads/2015/05/Contact-us.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 style="color:white;">Contact Us</h1>
                        <ol class="breadcrumb"><li><a style="color:white;" href="http://ameriteckwebservices.net/charity">Home</a></li>
                          <li class="active" style="color:white;">Become Volunteer</li></ol>                    </div>
                </div>
            </div>
        </div>

         
        <div class="content-wrapper container" id="page-info">
	<div class="row">
	
		<div class="col-xs-12 col-sm-6 contact-form">
			<div class="col-xs-12" id="success"></div>
			<h2>Send us Message</h2>
			<div class="wpcf7" id="wpcf7-f232-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"></div>
<form name="" action="#" method="post" class="wpcf7-form" novalidate="novalidate">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="232">
<input type="hidden" name="_wpcf7_version" value="4.0.3">
<input type="hidden" name="_wpcf7_locale" value="en_US">
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f232-o1">
<input type="hidden" name="_wpnonce" value="2e98fc28b9">
</div>
<div class="row">
<div class="form-group col-xs-12 col-sm-6"><label for="name">Name<span>*</span></label><span class="wpcf7-form-control-wrap text-821"><input type="text" name="text-821" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" id="name" aria-required="true" aria-invalid="false"></span></div>
<div class="form-group col-xs-12 col-sm-6"><label for="email">Email<span>*</span></label><span class="wpcf7-form-control-wrap email-959"><input type="email" name="email-959" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" id="email" aria-required="true" aria-invalid="false"></span></div>
</div>
<div class="form-group"><label for="sub">Subject<span>*</span></label><br>
<span class="wpcf7-form-control-wrap text-674"><input type="text" name="text-674" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" id="sub" aria-required="true" aria-invalid="false"></span></div>
<div class="form-group"><label for="message">Message</label><span class="wpcf7-form-control-wrap textarea-824"><textarea name="textarea-824" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea form-control" id="message" aria-invalid="false"></textarea></span></div>
<p><input type="submit" value="Submit" class="wpcf7-form-control wpcf7-submit btn btn-default" id="submit"></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>		</div>
		
		
		<div class="col-xs-12 col-sm-5 col-sm-offset-1 contact-address">
			<h2><a href="http://ameriteckwebservices.net/charity/wp-content/uploads/2015/05/Contact-us.jpg"><img class="alignnone size-full wp-image-202" src="http://ameriteckwebservices.net/charity/wp-content/uploads/2015/05/Contact-us.jpg" alt="Contact us" width="1300" height="300"></a></h2>
<h2>Get in touch</h2>
<p>Address : A-2, Sector-63,Noida, 201301,<br>
IndiaE-Mail : contact@charity.com<br>
Tel : +1 707 921 7269<br>
Fax : +1 206 973 7944</p>
<p class="hide-if-no-js">
</p><p>&nbsp;</p>
 		</div>
	</div>
</div>
</div>


























<div class="volunteer-create" style="background:url(<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/images/volunteer-register.jpg);">

    <div class="container">
        <div class="row">
				<section class="our-causes">
				    <div class="container">
				        <div class="row">
				            <div class="col-xs-12">
				                <div class="col-xs-5" style="background: #EFCF4E; margin: 40px 0;">
								    <h1><?= Html::encode($this->title) ?></h1>
				                    <?php $form = ActiveForm::begin(['layout'=>'horizontal']); ?>

				                    <div class="row">
				                    	<?= $form->field($model, 'FirstName')->textInput(['maxlength' => true, 'placeholder'=>'First Name'])->label(false) ?>
				                	</div>
				                    <div class="row">
					                    <?= $form->field($model, 'LastName')->textInput(['maxlength' => true, 'placeholder'=>'Last Name'])->label(false) ?>
				                	</div>

				                    <div class="row">
					                    <?= $form->field($model, 'Email')->textInput(['maxlength' => true, 'placeholder'=>'Email Address'])->label(false) ?>
				                	</div>

				                    <div class="row">
					                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder'=>'Password'])->label(false) ?>
				                	</div>
				                    
				                    <div class="row">
					                    <?= $form->field($model, 'repeatpassword')->passwordInput(['maxlength' => true, 'placeholder'=>'Confirm Password'])->label(false) ?>
				                	</div>
				                    
				                    <div class="form-group">
				                        <?= Html::submitButton($model->isNewRecord ? 'Register Me' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style'=>'margin-left: 30%;;']) ?>
				                    </div>

				                    <?php ActiveForm::end(); ?>
				                </div>

				            </div>
				        </div>
				    </div>
				</section>
		</div>
	</div>

</div>
