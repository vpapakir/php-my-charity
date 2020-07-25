<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Reason;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Cause */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

    <?php $form = ActiveForm::begin(); ?>

	
    <?php  $Reason = ArrayHelper::map( Reason::find()->all(),'ReasonId','Reason');
	
	echo $form->field($model, 'Reason')->dropDownList($Reason,['prompt'=>'Select Reason','search-select']) ?>
 
  
  
    <div class="form-group">
        <?= Html::submitButton('Assign &amp; Approve', ['class' => 'btn btn-primary']) ?>
    </div>
   

    <?php ActiveForm::end(); ?>

</div>
