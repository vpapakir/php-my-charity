<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\NgoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ngos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2><?= Html::encode($this->title) ?></h2>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Create Ngo', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'Id',
                        'NgoName',
                        ['attribute'=>'FirstName','value'=>function ($data){return $data->FirstName. " ". $data->LastName;}, 'options'=>['width'=>'160']],
                        'City',
                        'State',
                        'Website',
                        // 'LastName',
                        'Mobile',
                        'Email:email',
                        // 'RegistrationType',
                        // 'Valid12A',
                        // 'PanNumber',
                        // 'Beneficiaries',
                        // 'Expenditure',
                        // 'PrimaryArea',
                        // 'OperatingState',
                        // 'ProfilePic',
                        // 'EnteredOn',
                        // 'UserId',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

            </div>
        </div>
    </div>
</div>