<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PrimaryArea */

$this->title = 'Update Primary Area: ' . ' ' . $model->AreaName;
$this->params['breadcrumbs'][] = ['label' => 'Primary Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AreaName, 'url' => ['view', 'id' => $model->AreaId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
        	<div class="panel-body">
                <h3><?= Html::encode($this->title) ?></h3>
                <br />
            
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
		    </div>
		</div>
	</div>
</div>
