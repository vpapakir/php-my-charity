<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>



    <style type="text/css">
label{
    text-align: left !important;

}
</style>
<div class="site-signup">
	
    <div class="row">
        
        <div class="col-md-7 col-md-offset-1">
           
    
            <?php $form = ActiveForm::begin(['id' => 'form-signup','layout'=>'horizontal']); ?>

                <?= $form->field($model, 'fullname')->textInput(['placeholder'=>'Full Name']) ?>
                <?= $form->field($model, 'username')->textInput(['placeholder'=>'Username']) ?>
                <?= $form->field($model, 'email')->textInput(['placeholder'=>'Email']) ?>
                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password'])?>
                <?= $form->field($model, 'repeatpassword')->passwordInput(['placeholder'=>'Repeat Password']) ?>
                 <?php $authItems   =   ArrayHelper::map($authItem,'name','name'); ?>
                <?= $form->field($model, 'Role')->dropDownList($authItems,
                                                        ['prompt' => 'Select User Group' ]); ?>
                <div class="form-group" style="margin-left:13px">
                    <div class="col-md-offset-3">
                    	<?= Html::submitButton('Save', ['class' => 'btn btn-primary','name' => 'signup-button']) ?>
                    
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    

</div>
