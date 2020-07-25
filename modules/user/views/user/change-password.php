<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Change Password';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;


?>

<div class="panel panel-default">
	  <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i><?= Html::encode($this->title) ?> </h6></div>
	    <div class="panel-body">
   


			<!-- Login Form Starts -->

    <?php $form = ActiveForm::begin([ 'layout' => 'horizontal',
    									'fieldConfig' => [
            							'template' => "{label}\n<div class=\"col-sm-3\">{input}</div>\n<div class=\"col-sm-5\">{error}</div>",
           								 'labelOptions' => ['class' => 'col-sm-2 control-label'],
       									 ],]); ?>
      
     					
       	<?= $form->field($model, 'oldpassword')->passwordInput() ?>
        
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'repeatpassword')->passwordInput() ?>

    <div class="form-group">
        <div class="col-md-offset-3 col-md-3">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

				
    <?php ActiveForm::end(); ?>

           
            </div>
        </div>		
