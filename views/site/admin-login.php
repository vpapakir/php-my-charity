<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
?>
<style type="text/css">
.control-label
{
	display:none;
}
input
{
	width:550% !important;
}
</style>
<div class="login-body">
    <div class="login-title"><strong>Welcome</strong>, Please login</div>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

                    <div class="form-group">
                        <div class="col-md-12">
						    <?= $form->field($model, 'username')->textInput(['class'=>'form-control', 'placeholder'=>'User Name']) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                        <?= $form->field($model, 'password')->passwordInput( ['class'=>'form-control', 'placeholder'=>'Password']) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                        <div class="col-md-6">
				            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-info btn-block', 'name' => 'login-button']) ?>
                        </div>
                    </div>

    <?php ActiveForm::end(); ?>
</div>
