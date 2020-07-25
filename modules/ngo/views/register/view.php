<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ngo\models\Ngo */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Ngos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ngo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id',
            'NgoName',
            'Name',
            'Country',
            'State',
            'City',
            'Email:email',
            'Address',
            'Pincode',
            'EnteredOn',
            'UserId',
        ],
    ]) ?>

</div>
