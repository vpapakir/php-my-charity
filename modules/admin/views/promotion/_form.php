<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Promotion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promotion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CuaseId')->textInput() ?>

    <?= $form->field($model, 'Promoter')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ApprovedOn')->textInput() ?>

    <?= $form->field($model, 'EnteredOn')->textInput() ?>

    <?= $form->field($model, 'FlagNgo')->textInput() ?>

    <?= $form->field($model, 'FlagAdmin')->textInput() ?>

    <?= $form->field($model, 'Unique')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
