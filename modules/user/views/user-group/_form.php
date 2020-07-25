<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">
	
    <?php $form = ActiveForm::begin(); ?>
	
      
		<div class="row">
            <div class="col-md-6">
               <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?> 
           </div>
    	</div>
	  <div class="row">
    	 <div class="col-md-6">
         <label>Accsess</label>
         <?php 
		
		 $child	=	ArrayHelper::map($add2admin,'name','name');
		echo $form->field($model, 'child')->checkBoxList($child,['unselect'=>NULL])->label(false);
		
		 ?>
		   </div>
    </div>
    
   
   </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
