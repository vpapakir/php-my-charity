<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
      <div class="row">
      <div class="col-xs-12 ">
       <?php  if (Yii::$app->session->hasFlash('emailvarification')): ?>

                <div class="alert alert-info" style="margin-top:10px; margin-bottom:-5px">
                   <p align="center">Your Email has been  Successfully varified. Now You can login using your email and choosen password</p>
                </div>
                <?php endif;?>
      <header class="page-header section-header">
        <h2><strong>Login to your account.</strong></h2>
      </header>
      <div class="row help-list">
      <div class="col-xs-12 col-sm-6 col-lg-5">
        <article class="media"> <a class="pull-left warning-icon-box" href="#"><img src="/charity/web/../themes/main/layouts/images/media.png" alt="Media"> </a>
          <div class="media-body less-width">
            <h3 class="media-heading">Media</h3>
            <p>Lorem ipsum dolor sit amet consecte tur adipiscisl at dui tempus,dolor sit amet consecte</p>
          </div>
        </article>
        <article class="media"> <a class="pull-left warning-icon-box" href="volunteers/index.html"><img src="/charity/web/../themes/main/layouts/images/user.png" alt="Become Volunteer"> </a>
          <div class="media-body less-width">
            <h3 class="media-heading">Become Volunteer</h3>
            <p>Consecte tur adipiscing elit ellentesque egestas nisl at dui tempus,dolor sit amet consecte</p>
          </div>
        </article>
        <article class="media"> <a class="pull-left warning-icon-box fancybox fancybox.iframe " href="wp-content/themes/twentyfifteen/donate/index.html"><img src="/charity/web/../themes/main/layouts/images/heart.png" alt="Send Donation"> </a>
          <div class="media-body less-width">
            <h3 class="media-heading">Send Donation</h3>
            <p>Lorem ipsum dolor sit amet consecte tur adipiscisl at dui tempus,dolor sit amet consecte</p>
          </div>
        </article>
      </div>
        <div class="col-sm-7" style="border:#ccc solid 1px; padding:15px; border-radius:5px;">

           
                
               

                <strong>Please fill out the following fields to login:</strong>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n\n<div class=\"col-lg-10\"><div class=\"col-lg-5\">&nbsp</div>{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-4 control-label'],
                    ],
                ]); ?>
                <div class="row" style="margin-top:50px;">
                    <div class="col-sm-12">
                        <?= $form->field($model, 'username')->textInput(['placeholder'=>'User Name']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary pull-right', 'name' => 'login-button']) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'rememberMe', [
                            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        ])->checkbox() ?>
                    </div>
                </div>

               

                <strong>Not a user? Click <a href="<?= Yii::getAlias('@web'); ?>/users/register">here</a> now.</strong>

                <?php ActiveForm::end(); ?>
        </div>
      </div>

            </div>
        </div>
    </div>


<div class="site-login">

</div>
