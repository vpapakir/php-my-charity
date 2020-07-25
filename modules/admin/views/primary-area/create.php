<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PrimaryArea */

$this->title = 'Create Primary Area';
$this->params['breadcrumbs'][] = ['label' => 'Primary Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-6">
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
