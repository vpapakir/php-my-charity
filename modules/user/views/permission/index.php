<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users Permission';
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
					        	<span class="pull-right"><?= Html::a('Add Permission', ['create'], ['class' => 'label label-success']) ?></span>
				        	</div>
				           <div class="panel-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'summary'=>'',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
           // 'type',
            'description:ntext',
          //  'rule_name',
           // 'data:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
