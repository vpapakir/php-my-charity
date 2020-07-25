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
        <?= $form->field($model, 'NgoName')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'Website')->textInput(['maxlength' => true]) ?>
      </div>
    </div>
  
    <div class="row">
      <div class="col-sm-6">
        <?= $form->field($model, 'City')->textInput(); ?>
      </div>
      <div class="col-sm-6">
        <?= $form->field($model, 'State')->textInput(); ?>
      </div>
    </div>   
   
    <div class="row">
    	<div class="col-md-6">
    <?= $form->field($model, 'FirstName')->textInput() ?>
		</div>
        <div class="col-md-6">
      <?= $form->field($model, 'LastName')->textInput(['maxlength' => 100]) ?>	
        </div>
    </div>

    <div class="row">
      <div class="col-md-6">
       <?= $form->field($model, 'Mobile')->textInput(['maxlength' => 10]) ?>
      </div>
      <div class="col-md-6">
       <?= $form->field($model, 'Email')->textInput(['maxlength' => 100]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
       <?= $form->field($model, 'RegistrationType')->dropDownList([ 'Trust' => 'Trust', 'Society' => 'Society', 'Section 25'=>'Section 25'], ['prompt' => 'Registration Type']) ?>
      </div>
      <div class="col-md-6">
       <?= $form->field($model, 'Valid12A')->radioList(array('Yes'=>'Yes','No'=>'No')); ?>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-6">
       <?= $form->field($model, 'PanNumber')->textInput(['maxlength' => 10]) ?>
      </div>
      <div class="col-md-6">
       <?= $form->field($model, 'Beneficiaries')->textInput(['maxlength' => 100]) ?>
      </div>
    </div>
   
    <div class="row">
      <div class="col-md-6">
       <?= $form->field($model, 'Expenditure')->textInput(['maxlength' => 10]) ?>
      </div>
      <div class="col-md-6">
       <?= $form->field($model, 'PrimaryArea')->textInput(['maxlength' => 100]) ?>
      </div>
    </div>
   
    <div class="row">
      <div class="col-md-12">
        <?php
            $State  = ArrayHelper::map(State::find()->where("1 order by StateId")->asArray()->all(), 'StateId', 'StateName');
        ?>
        <?php echo $form->field($model, 'OperatingState[]')->dropdownList($State, ['multiple'=>true])->label('Operating State'); ?>
        <label>Hold <i>'ctl'</i> to select multiple.</label>
      </div>
    </div>
   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-brown' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style type="text/css">
#ngo-operatingstate label{width: 100%;}
</style>