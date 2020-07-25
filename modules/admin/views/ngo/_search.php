<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\NgoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ngo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'NgoName') ?>

    <?= $form->field($model, 'City') ?>

    <?= $form->field($model, 'State') ?>

    <?= $form->field($model, 'Website') ?>

    <?php // echo $form->field($model, 'FirstName') ?>

    <?php // echo $form->field($model, 'LastName') ?>

    <?php // echo $form->field($model, 'Mobile') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'RegistrationType') ?>

    <?php // echo $form->field($model, 'Valid12A') ?>

    <?php // echo $form->field($model, 'PanNumber') ?>

    <?php // echo $form->field($model, 'Beneficiaries') ?>

    <?php // echo $form->field($model, 'Expenditure') ?>

    <?php // echo $form->field($model, 'PrimaryArea') ?>

    <?php // echo $form->field($model, 'OperatingState') ?>

    <?php // echo $form->field($model, 'ProfilePic') ?>

    <?php // echo $form->field($model, 'EnteredOn') ?>

    <?php // echo $form->field($model, 'UserId') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>