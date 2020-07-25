<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Cause */

$this->title = 'Create Cause';
$this->params['breadcrumbs'][] = ['label' => 'Causes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="container">
 
   
<div class="row">
<div class="col-md-9">
 <h3 ><?= Html::encode($this->title) ?></h3>
   <hr/>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CauseTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CauseDescription')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'Image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NgoName')->textInput() ?>
    
    <?= $form->field($model, 'DonationRequired')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EndDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>             
               
</div>
</div>
</div>
