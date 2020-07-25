<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\volunteer\models\Volunteer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="volunteer-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'FirstName')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'LastName')->textInput(['maxlength' => true]) ?>
        </div>
    </div> 

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Country')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'State')->textInput(['maxlength' => true]) ?>
        </div>
    </div> 

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'City')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>
        </div>
    </div> 

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Pincode')->textInput(['maxlength' => true]) ?>
        </div>
    </div> 
<br />
    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-6">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create Volunteer' : 'Update Volunteer', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div> 

    <?php ActiveForm::end(); ?>

</div>
