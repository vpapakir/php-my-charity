<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Add User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
	  <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i><?= Html::encode($this->title) ?> </h6></div>
	    <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
        'authItem'  =>  $authItem,
    ]) ?>

	</div>
</div>
              