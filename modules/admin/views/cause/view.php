<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Cause */

$this->title = $model->CauseId;
$this->params['breadcrumbs'][] = ['label' => 'Causes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->CauseId], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->CauseId], [
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
                        'CauseId',
                        'CauseTitle',
                        'CauseDescription:ntext',
                        'Image',
                        'NgoName',
                        'RegisterBy',
                        'RegisterType',
                        'Promoters',
                        'DonationCollected',
                        'RegisterOn',
                        'Reason',
                        'ApprovedOn',
                        'Status',
                        'DonationRequired',
                        'EndDate',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
