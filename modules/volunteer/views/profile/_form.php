<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\State;


/* @var $this yii\web\View */
/* @var $model app\themes\main\modules\eadmin\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    	
        
    	<div class="col-md-6">
            <?= $form->field($model, 'FirstName')->textInput(['maxlength' => 50]) ?>
        </div>
        
    	<div class="col-md-6">
            <?= $form->field($model, 'LastName')->textInput(['maxlength' => 50]) ?>
        </div>
	</div>
     
      
   
   
    <div class="row">
    	<div class="col-md-6">
    <?= $form->field($model, 'Email')->textInput(['readOnly'=>'readOnly']) ?>
		</div>
        <div class="col-md-6">
     <?= $form->field($model, 'Mobile')->textInput(['maxlength' => 100]) ?>
        </div>
    </div>
    
    

    <div class="row">
    	<div class="col-md-6">
        <?php $State = ArrayHelper::map(State::find()->all(),'StateId','StateName');
		 echo $form->field($model, 'State')->dropDownList($State,['Prompt' => 'Select State']) ?>
		</div>
        <div class="col-md-6">
		  <?= $form->field($model, 'City')->textInput(['maxlength' => 100]) ?>	   
            
		</div>
    </div>
     <div class="row">
    	<div class="col-md-6">
		  <?= $form->field($model, 'Pan')->textInput(['maxlength' => 100]) ?>  
		</div>
        <div class="col-md-6">
		<?= $form->field($model, 'Address')->textInput(['maxlength' => 255]) ?>   
           
		</div>
    </div>
   

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-brown' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
