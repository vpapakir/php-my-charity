<?php

use yii\helpers\Html;

use yii\bootstrap\ActiveForm;

use yii\captcha\Captcha;



/* @var $this yii\web\View */

/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */



$this->title = 'Contact Us';

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">

      <div class="row">

      <div class="col-xs-12 ">

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>



    <div class="alert alert-success">

        Thank you for contacting us. We will respond to you as soon as possible.

    </div>



      <?php endif; ?>  

  



   

 <header class="page-header section-header">

        <h2><strong><?= $this->title ?></strong></h2>

      </header>

      <div class="row help-list">

      <div class="col-xs-12 col-sm-6 col-lg-5">

        <article class="media"> <a class="pull-left warning-icon-box" href="#"><img src="/charity/web/../themes/main/layouts/images/media.png" alt="Media"> </a>

          <div class="media-body less-width">

            <h3 class="media-heading">Media</h3>

            <p>Help spread the word about the work of Beyond Wallets, by sharing our work on social media. Remember, every drop counts, hence, everyone together can make a big difference. By creating propaganda of our cause, we ensure that we really make a difference in the lives of these deprived people.</p>

          </div>

        </article>

        <article class="media"> <a class="pull-left warning-icon-box" href="volunteers/index.html"><img src="/charity/web/../themes/main/layouts/images/user.png" alt="Become Volunteer"> </a>

          <div class="media-body less-width">

            <h3 class="media-heading">Become Volunteer</h3>

            <p>You can volunteer in our activities, and do your bit truly going beyond wallets. Spare your precious time for those who need your help, in return you’ll earn their smiles and blessings. Make an impact today. Join us, help us, and even guide us in this process. We can learn from each other.</p>

          </div>

        </article>

        <article class="media"> <a class="pull-left warning-icon-box fancybox fancybox.iframe " href="wp-content/themes/twentyfifteen/donate/index.html"><img src="/charity/web/../themes/main/layouts/images/heart.png" alt="Send Donation"> </a>

          <div class="media-body less-width">

            <h3 class="media-heading">Send Donation</h3>

            <p>We understand that your hard-earned money has to be spent on the right reason and what better than donating it for a noble cause. We understand that you might be sacrificing on little joys of yours, but be assured that your little sacrifice will make a huge difference in someone’s life. Donate your money to any of our causes.</p>

          </div>

        </article>

      </div>

       <div class="col-sm-5 col-sm-offset-2" style="background: #EFCF4E; border:#D5B430 solid 3px; padding-top: 40px; margin-bottom:25px">

   



   

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['placeHolder'=> 'Your Name'])->label(false) ?>

                <?= $form->field($model, 'email')->textInput(['placeHolder'=> 'Your Email'])->label(false) ?>

                <?= $form->field($model, 'subject')->textInput(['placeHolder'=> 'Your Subject'])->label(false) ?>

                <?= $form->field($model, 'body')->textArea(['rows' => 2,'placeHolder'=> 'Your Message'])->label(false) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [

                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',

                ]) ?>

                <div class="form-group">

                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>

                </div>

            <?php ActiveForm::end(); ?>

    </div>

      </div>



            </div>

        </div>

  



   

</div>

