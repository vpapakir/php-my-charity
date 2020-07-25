<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Cause */

$this->title = 'Update Cause: ' . ' ' . $model->CauseId;
$this->params['breadcrumbs'][] = ['label' => 'Causes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CauseId, 'url' => ['view', 'id' => $model->CauseId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
        	<div class="panel-body">
			    <h1><?= Html::encode($this->title) ?></h1>

			    <?= $this->render('_form', [
			        'model' => $model,
			    ]) ?>
		    </div>
		</div>
	</div>
</div>
