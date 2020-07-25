<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Volunteers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="volunteer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Volunteer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'FirstName',
            'LastName',
            'Country',
            'State',
            // 'City',
            // 'Email:email',
            // 'Address',
            // 'Pincode',
            
            // 'EnteredOn',
            // 'UserId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>