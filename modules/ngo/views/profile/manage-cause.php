<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ngo\models\CauseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Causes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
 
   
<div class="row">
<div class="col-md-9">
 <h3 ><?= Html::encode($this->title) ?></h3>
   <hr/>
   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'CauseId',
            'CauseTitle',
            'CauseDescription:ntext',
            // 'Image',
           // 'NgoName',
            // 'RegisterBy',
            // 'RegisterType',
            // 'Promoters',
            // 'DonationCollected',
            // 'RegisterOn',
            'Reason',
            // 'ApprovedOn',
            'Status',
            // 'DonationRequired',
            // 'EndDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>             
    <?php include'sidebar.php'; ?>              
</div>
</div>
</div>
