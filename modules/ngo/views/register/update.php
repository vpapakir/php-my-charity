<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ngo\models\Ngo */

$this->title = 'Update Ngo: ' . ' ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Ngos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ngo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
