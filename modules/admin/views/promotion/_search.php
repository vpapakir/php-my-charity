<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PromotionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promotion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'CuaseId') ?>

    <?= $form->field($model, 'Promoter') ?>

    <?= $form->field($model, 'Status') ?>

    <?= $form->field($model, 'ApprovedOn') ?>

    <?php // echo $form->field($model, 'EnteredOn') ?>

    <?php // echo $form->field($model, 'FlagNgo') ?>

    <?php // echo $form->field($model, 'FlagAdmin') ?>

    <?php // echo $form->field($model, 'Unique') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
