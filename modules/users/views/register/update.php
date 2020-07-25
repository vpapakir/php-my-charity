<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\volunteer\models\Volunteer */

$this->title = 'Update Volunteer: ' . ' ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Volunteers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="volunteer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
