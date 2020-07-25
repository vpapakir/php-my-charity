<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ngo\models\NgoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ngo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'NgoName') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'Country') ?>

    <?= $form->field($model, 'State') ?>

    <?php // echo $form->field($model, 'City') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'Address') ?>

    <?php // echo $form->field($model, 'Pincode') ?>

    <?php // echo $form->field($model, 'EnteredOn') ?>

    <?php // echo $form->field($model, 'UserId') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
