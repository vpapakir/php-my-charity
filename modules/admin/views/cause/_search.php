<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CauseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cause-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CauseId') ?>

    <?= $form->field($model, 'CauseTitle') ?>

    <?= $form->field($model, 'CauseDescription') ?>

    <?= $form->field($model, 'Image') ?>

    <?= $form->field($model, 'NgoName') ?>

    <?php // echo $form->field($model, 'RegisterBy') ?>

    <?php // echo $form->field($model, 'RegisterType') ?>

    <?php // echo $form->field($model, 'Promoters') ?>

    <?php // echo $form->field($model, 'DonationCollected') ?>

    <?php // echo $form->field($model, 'RegisterOn') ?>

    <?php // echo $form->field($model, 'Reason') ?>

    <?php // echo $form->field($model, 'ApprovedOn') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'DonationRequired') ?>

    <?php // echo $form->field($model, 'EndDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
