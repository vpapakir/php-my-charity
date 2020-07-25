<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PromotionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Promotions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body"> 
               <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'Id',
            'CuaseId',
            'Promoter',
            'Status',
            'ApprovedOn',
            // 'EnteredOn',
            // 'FlagNgo',
            // 'FlagAdmin',
            // 'Unique',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{approve} {reject}', 
							
							'buttons'=>[
							  'approve' => function ($url, $model,$key) { 
							  	  if($model->Status!='Approved'){ 
                                return Html::a('<span class="fa fa-hand-o-up"></span>','status?status=Approved&id='.$key,[
                                        'title' => Yii::t('yii', 'Approve'), 'data-toggle'=>"tooltip",
										
                                ]);
								 } else{
									   
									   return Html::a('<span class="fa fa-hand-o-down"></span>','status?status=Rejected&id='.$key,[
                                        'title' => Yii::t('yii', 'Reject'), 'data-toggle'=>"tooltip",

                                ]);  
									   }     
								   },   
								   
								   'reject' => function ($url, $model,$key) { 
							  	  if($model->Status==='Pending'){ 
                                return Html::a('<span class="fa fa-hand-o-down"></span>','status?status=Rejected&id='.$key,[
                                        'title' => Yii::t('yii', 'Reject'), 'data-toggle'=>"tooltip",
										
                                ]);
								
									   }     
								   },   
							  
							  ],
						
							],
        ],
    ]); ?>

  </div>
        </div>
    </div>
</div>
