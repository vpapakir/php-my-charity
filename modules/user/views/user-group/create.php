<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthItem */

$this->title = 'Create User Group';
$this->params['breadcrumbs'][] = ['label' => 'User Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
	  <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i><?= Html::encode($this->title) ?> </h6></div>
	    <div class="panel-body">
   


                            <?= $this->render('_form', [
                                'model' => $model,
								'add2admin'=>$add2admin,
								
                            ]) ?>
                       
			</div>
		</div>
