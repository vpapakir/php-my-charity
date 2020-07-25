<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use  app\modules\admin\models\PrimaryArea;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Cause */

$this->title = 'Create Cause';
$this->params['breadcrumbs'][] = ['label' => 'Causes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
#cke_1_contents, #cke_2_contents, #cke_3_contents{
    height: 50% !important;
}
.control-label{
    font-weight: bold;
}
</style>
 <div class="container">
 
   
<div class="row">
<div class="col-md-9">
    <div class="col-md-12" style="border: #bfbfbf solid 1px; border-radius: 5px; margin: 25px 0;">
        <h3 ><?= Html::encode($this->title) ?></h3>
       <hr/>

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <?= $form->field($model, 'CauseTitle')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'CauseDescription')->widget(CKEditor::className()) ?>

            <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'DonationRequired')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'MinDonation')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'DonerList')->radioList(['Yes'=>'Yes', 'No'=>'No']) ?>

            <?= $form->field($model, 'PageMessage')->widget(CKEditor::className()) ?>

            <?= $form->field($model, 'ThanksMessage')->widget(CKEditor::className()) ?>

             <div class="row">
                <div class="col-sm-6">
                     <?= $form->field($model, 'RaiseExtra')->radioList(['Yes'=>'Yes', 'No'=>'No']) ?>
                </div>
                <div class="col-md-6">
                    <?php $PrimaryArea = ArrayHelper::map(PrimaryArea::find()->all(),'AreaId','AreaName'); ?>

                    <?= $form->field($model, 'PrimaryArea')->dropdownlist($PrimaryArea,['prompt'=>'Select One']) ?>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-6">
                <label class="control-label" for="cause-enddate">Start Date</label>
                <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'StartDate',
                'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-M-yyyy',
                        'class' => 'test'
                    ],
                ]);?>
            </div>
            <div class="col-sm-6">
            <label class="control-label" for="cause-enddate">End Date</label>
            <?= DatePicker::widget([
            'model' => $model,
            'attribute' => 'EndDate',
            'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);?>
            </div>
        </div>        
        <br />

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>             
    <?php include'sidebar.php'; ?>              
</div>
</div>
</div>
