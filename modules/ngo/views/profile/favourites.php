<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Favourites';
$this->params['breadcrumbs'][] = $this->title;

	


?>
<div class="member-index">
 <div class="container">
 
   
<div class="row">

<div class="col-md-9">
 <h3 ><?= Html::encode($this->title) ?></h3>
   <hr/>
	
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
         
           ['attribute' => 'CauseId','label'=>'Cause Title', 'value'=>function($data){ return substr($data->cause['CauseTitle'],0,30) ;}],

            ['attribute' => 'Promoter','label'=>'Promoter', 'value'=>function($data){ return $data->promoter['FirstName'].' '.$data->promoter['LastName']; }],
         
           
            


          
        ],
    ]); ?>			
                
                
   </div>             
                <?php include'sidebar.php'; ?>
</div>
</div>
</div>
