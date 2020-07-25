<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ngo */

$this->title = $model->NgoName;
$this->params['breadcrumbs'][] = ['label' => 'Ngos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
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
                        // 'Id',
                        'NgoName',
                        'City',
                        'State',
                        'Website',
                        'FirstName',
                        'LastName',
                        'Mobile',
                        'Email:email',
                        'RegistrationType',
                        'Valid12A',
                        'PanNumber',
                        'Beneficiaries',
                        'Expenditure',
                        'PrimaryArea',
                        'OperatingState',
                        // 'ProfilePic',
                        // 'EnteredOn',
                        // 'UserId',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>