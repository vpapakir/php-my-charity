<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PrimaryArea */

$this->title = $model->AreaName;
$this->params['breadcrumbs'][] = ['label' => 'Primary Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3><?= Html::encode($this->title) ?></h3>

                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->AreaId], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->AreaId], [
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
                        // 'AreaId',
                        'AreaName',
                        'Status',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
