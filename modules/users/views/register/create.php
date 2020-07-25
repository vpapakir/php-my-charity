<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\volunteer\models\Volunteer */

$this->title = 'Register User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="main" style="background:url(<?= Yii::getAlias('@web'); ?>/../themes/main/layouts/images/volunteer-register.jpg);">		

         
        <div class="content-wrapper container" id="page-info">
	<div class="row">
    
    
    <?php if (Yii::$app->session->hasFlash('userRegister')): ?>

    <div class="alert alert-success">
        Thank you for Registration.A varification email is send to your email address.<br/>
        after varification you may able to login.
    </div>
	<?php endif;?>
		<div class="col-sm-4" style="background: #EFCF4E; border:#D5B430 solid 3px; margin-top: 40px;">
			<div class="col-xs-12" id="success"></div>
			<div>
			<h1><?= Html::encode($this->title) ?></h1>
			<div class="screen-reader-response"></div>



			<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],]); ?>

				<div class="row">
					<div class="col-xs-12">
						<?= $form->field($model, 'FirstName')->textInput(['maxlength' => true, 'placeholder'=>'First Name']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
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