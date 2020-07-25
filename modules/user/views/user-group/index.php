<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Groups';
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
					        	<span class="pull-right"><?= Html::a('Create User Group', ['create'], ['class' => 'label label-success']) ?></span>
				        	</div>
				           <div class="panel-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            ['attribute'=>'data','label'=>'Subscriptions','value'=>function($data){            
									return $data->getTotalUser($data);    
									}, ],

			 ['attribute'=>'data','label'=>'Access Level','value'=>function($data){            
									return $data->getLevel($data);    
									}, ],
			
          
          //  'description:ntext',
           // 'rule_name',
          //  'data:ntext',
            // 'created_at',
           // ['attribute'=> 'updated_at','label'=>'Last Modified','value'=>'updated_at'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

 </div>
</div>
               