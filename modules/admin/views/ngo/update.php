<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ngo */

$this->title = 'Update Ngo: ' . ' ' . $model->NgoName;
$this->params['breadcrumbs'][] = ['label' => 'Ngos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NgoName, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
        	<div class="panel-body">
			    <h2><?= Html::encode($this->title) ?></h2>

			    <?= $this->render('_form', [
			        'model' => $model,
			    ]) ?>
		    </div>
		</div>
	</div>
</div>
