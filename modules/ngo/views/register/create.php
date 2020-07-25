<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\ngo\models\Ngo */

$this->title = 'Register NGO';
$this->params['breadcrumbs'][] = ['label' => 'NGO', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
      <div class="row">
      <div class="col-xs-12 ">
      <?php if (Yii::$app->session->hasFlash('ngoRegister')): ?>

    <div class="alert alert-success">
        Thank you for Registration.A varification email is send to your email address.<br/>
        after varification you may able to login.
    </div>
	<?php endif;?>
	
		 <header class="page-header section-header">
        <h2><strong><?= $this->title ?></strong></h2>
      </header>
      <div class="row help-list">
      <div class="col-xs-12 col-sm-6 col-lg-5">
        <article class="media"> <a class="pull-left warning-icon-box" href="#"><img src="/charity/web/../themes/main/layouts/images/media.png" alt="Media"> </a>
          <div class="media-body less-width">
            <h3 class="media-heading">Media</h3>
            <p>Lorem ipsum dolor sit amet consecte tur adipiscisl at dui tempus,dolor sit amet consecte</p>
          </div>
        </article>
        <article class="media"> <a class="pull-left warning-icon-box" href="volunteers/index.html"><img src="/charity/web/../themes/main/layouts/images/user.png" alt="Become Volunteer"> </a>
          <div class="media-body less-width">
            <h3 class="media-heading">Become Volunteer</h3>
            <p>Consecte tur adipiscing elit ellentesque egestas nisl at dui tempus,dolor sit amet consecte</p>
          </div>
        </article>
        <article class="media"> <a class="pull-left warning-icon-box fancybox fancybox.iframe " href="wp-content/themes/twentyfifteen/donate/index.html"><img src="/charity/web/../themes/main/layouts/images/heart.png" alt="Send Donation"> </a>
          <div class="media-body less-width">
            <h3 class="media-heading">Send Donation</h3>
            <p>Lorem ipsum dolor sit amet consecte tur adipiscisl at dui tempus,dolor sit amet consecte</p>
          </div>
        </article>
      </div>
      <div class="col-sm-5 col-sm-offset-2" style="background: #EFCF4E; border:#D5B430 solid 3px; padding-top: 40px; margin-bottom:25px">


			<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],]); ?>

				<div class="row">
					<div class="col-xs-12">
						<?= $form->field($model, 'NgoName')->textInput(['maxlength' => true, 'placeholder'=>'NGO Name']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<?= $form->field($model, 'FirstName')->textInput(['maxlength' => true, 'placeholder'=>'First Name']) ?>
					</div>
					<div class="col-xs-6">
						<?= $form->field($model, 'LastName')->textInput(['maxlength' => true, 'placeholder'=>'Last Name']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<?= $form->field($model, 'Email')->textInput(['maxlength' => true, 'placeholder'=>'Email Address']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder'=>'Password']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<?= $form->field($model, 'repeatpassword')->passwordInput(['maxlength' => true, 'placeholder'=>'Confirm Password']) ?>
					</div>
            	</div>
				<div class="form-group">
					<?= Html::submitButton($model->isNewRecord ? 'Register Me' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style'=>'margin-left: 30%;;']) ?>
				</div>
			<?php ActiveForm::end(); ?>
 </div>
      </div>

            </div>
        </div>
    </div>

