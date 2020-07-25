<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Reason */

$this->title = 'Update Reason: ' . ' ' . $model->ReasonId;
$this->params['breadcrumbs'][] = ['label' => 'Reasons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ReasonId, 'url' => ['view', 'id' => $model->ReasonId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reason-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
