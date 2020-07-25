<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ngo\models\NgoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ngos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ngo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ngo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'NgoName',
            'Name',
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
