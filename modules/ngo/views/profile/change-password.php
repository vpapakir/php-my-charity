<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = 'Chnage Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    


			<div class="row">
				<div class="col-sm-9">
                <h3  align="center"><?= Html::encode($this->title) ?></h3>
				

    <?php $form = ActiveForm::begin([ 'layout' => 'horizontal' ]); ?>
      
	  	
       	<?= $form->field($model, 'oldpassword')->passwordInput(['placeholder'=>'Your Old Password'])->label(false) ?>
        
        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Your New Password'])->label(false) ?>
        <?= $form->field($model, 'repeatpassword')->passwordInput(['placeholder'=>'Confirm New Password'])->label(false) ?>

    <div class="form-group">
        <div class="col-md-offset-3 col-md-6">
            <?= Html::submitButton('Change Password', ['class' => 'btn btn-primary btn-block']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

			<?php include 'sidebar.php'; ?>
    
</div>


</div>