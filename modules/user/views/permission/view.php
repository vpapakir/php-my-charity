<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AuthItem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users Permission', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
		        <div class="panel-heading">
			        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?= Html::encode($this->title) ?></h6>
                	<div class="dropdown pull-right">
                    	<a href="#" class="dropdown-toggle panel-icon" data-toggle="dropdown">
	                    	<i class="icon-cog3"></i> 
	                    	<b class="caret"></b>
                    	</a>
						<ul class="dropdown-menu icons-right dropdown-menu-right">
							<li><?= Html::a('<i class=\'icon-pencil\'></i>Update', ['update', 'id' => $model->name]) ?></li>
                            <li> <?= Html::a('<i class=\'icon-remove\'></i>Delete', ['delete', 'id' => $model->name], [
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?></li>
							
						</ul>
                	</div>
		        </div>
   
<div class="panel-body">
      

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
           // 'type',
            'description:ntext',
           // 'rule_name',
           // 'data:ntext',
           // 'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
</div>
