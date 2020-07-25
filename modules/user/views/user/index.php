<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabbable page-tabs">

<div class="tab-content">

                	<!-- First tab -->
                    <div class="tab-pane active fade in">

				        <!-- Tasks table -->
				        <div class="panel panel-default">
				        	<div class="panel-heading">
					        	<h6 class="panel-title"><i class="icon-grid"></i> <?= Html::encode($this->title) ?></h6>
					        	<span class="pull-right"><?= Html::a('Add User', ['add-user'], ['class' => 'label label-success']) ?></span>
				        	</div>
				           <div class="panel-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
         'summary'=>'', 					
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',],
          

          //  'id',
          	['attribute'=>'status','label'=>'User Name','value'=>'username',
          	'contentOptions'=>
          					['style'=>'border-right:0px;'],
          	'headerOptions' => 
          					['style'=>'border-right:0px'],
          					],
          /*  ['attribute'=>'status','value'=>function($data){            
									return $data->getStatus($data);    
									},
									'header'=>false,
									'headerOptions' => ['width' => '40','style'=>'border-left:0px'],
 									'contentOptions'=>function ($data){
                								$class=$data->status==10?'label-primary':'label-default';
                						return ['class'=>'pull-right label '.$class,
                								'style'=>'margin-top:16px;line-height:0px;margin-right:13px;padding: 10px !important;'];
           								 },

									
									],*/
            
              'fullname',
            //'auth_key',
            ['attribute'=>'id','label'=>'User Group','value'=>function($data){            
									return $data->getGroup($data);    
									}, ],
           // 'password_hash',
            // 'password_reset_token',
             'email:email',
           
			
            // 'created_at',
            // 'updated_at',

             
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

 	</div>
 </div>
               
        <style>
         td{
        	padding:15px !important;
        }
        </style>