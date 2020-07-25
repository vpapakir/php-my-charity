<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CauseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Causes';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
.row{margin-bottom:15px;}
.modalButton,view{
	background:none !important;
	 border:none; 
     padding:0!important;
	 font-size:14px;
	 color:#337ab7;
     cursor: pointer;
}
</style>
        
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1><?= Html::encode($this->title) ?></h1>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Create Cause', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                
                  <?php
    Modal::begin([
			'header'=>'Assign Reason',
            'id' => 'modal',
			'size'=> 'modal-md'
        ]);
 
    echo "<div id='modalContent'></div>";
 
    Modal::end();
    ?>         

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'CauseId',
                        'CauseTitle',
                        'CauseDescription:ntext',
                       // 'Image',
                        'NgoName',
                        'RegisterBy',
                      //  'RegisterType',
                        // 'Promoters',
                        // 'DonationCollected',
                        // 'RegisterOn',
                        // 'Reason',
                        // 'ApprovedOn',
                        
                         'DonationRequired',
                        // 'EndDate',
						'Status',
						'Featured',

                        ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update} {delete} {status} {featured}', 
							
							'buttons'=>[
                              'status' => function ($url, $model,$key) { 
							  	  if($model->Status!='Active'){ 
								  
								  return Html::button('<span class="fa fa-arrow-up"></span>',['value' => Url::to(['assign-reason?id='.$key]),
							'class' => 'modalButton',
							 'title' => Yii::t('yii', 'Active'),
							  'data-toggle'=>"tooltip",
							  
							//'class' => 'btn btn-success'
				 
						]);   
								   } else{
									   
									   return Html::a('<span class="fa fa-arrow-down"></span>','status?status=Inactive&id='.$key,[
                                        'title' => Yii::t('yii', 'Inactive'), 'data-toggle'=>"tooltip",

                                ]);  
									   }                               
                              },
							  
							  'featured' => function ($url, $model,$key) { 
							  	  if($model->Featured!='Yes'){ 
                                return Html::a('<span class="fa fa-hand-o-up"></span>','featured?status=Yes&id='.$key,[
                                        'title' => Yii::t('yii', 'Set Featured'), 'data-toggle'=>"tooltip",
										
                                ]);
								 } else{
									   
									   return Html::a('<span class="fa fa-hand-o-down"></span>','featured?status=No&id='.$key,[
                                        'title' => Yii::t('yii', 'Remove Featured'), 'data-toggle'=>"tooltip",

                                ]);  
									   }     
								   }   
							  
							  ],
						
							],
                    ],
                ]); ?>

            </div>
        </div>
    </div>
</div>
<script>
jQuery(function(){
jQuery('.modalButton').click(function (){
    jQuery('#modal').modal('show')
        .find('#modalContent')
        .load(jQuery(this).attr('value'));
});
});
</script>