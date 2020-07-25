<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthItem */

$this->title = 'Add New Permission';
$this->params['breadcrumbs'][] = ['label' => 'Users Permission', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="panel panel-default">
	  <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i><?= Html::encode($this->title) ?> </h6></div>
	    <div class="panel-body">
   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

	</div>
</div>
