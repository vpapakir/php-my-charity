<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Cause */

$this->title = $model->CauseTitle;
$this->params['breadcrumbs'][] = ['label' => 'Causes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
 
   
<div class="row">
<div class="col-md-9">
 <h3 ><?= Html::encode($this->title) ?></h3>
   <hr/>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CauseId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CauseId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         //   'CauseId',
            'CauseTitle',
            ['attribute'=>'CauseDescription','value'=> strip_tags(strip_tags($model->CauseDescription))],
            //'CauseDescription:ntext',
          ///  'Image',
          //  'NgoName',
          //  'RegisterBy',
          //  'RegisterType',
          //  'Promoters',
            'DonationRequired',
            'MinDonation',
            'DonationCollected',
            'DonerList',
            ['attribute'=>'PageMessage','value'=> strip_tags(strip_tags($model->PageMessage))],
            ['attribute'=>'ThanksMessage','value'=> strip_tags(strip_tags($model->ThanksMessage))],
            'RaiseExtra',
          //  'RegisterOn',
            'Reason',
           // 'ApprovedOn',
            'Status',
            'StartDate',
            'EndDate',
        ],
    ]) ?>

</div>             
    <?php include'sidebar.php'; ?>              
</div>
</div>
</div>