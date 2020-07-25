<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\Cause;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$db = Yii::$app->db;
$user = Yii::$app->user->identity;
$value = \Yii::$app->getRequest()->getCookies()->getValue('pid');
$id_all = implode(',',$value);

if($id_all !=''){
	$ids = $id_all;
	}
	else
	{
		$ids = '0';
		}

$query = "select * from tbl_cause where `CauseId` in ($ids)";
$command = $db->createCommand($query)->queryAll();

$url1 = "http://localhost/charity/payment";



?>
<div style="min-height:200px">
<hr/>
<h3 align="center">Please Wait......</h3>
<hr/>
</div>
<div style="display:none">
<form method="post" action="<?=Yii::getAlias('@web'); ?>/payment/index" id="frmdata">

			 <?php
				$ttlamount = 0;
               foreach($command as $v)
				{ 
				
				?>
				<input name="firstname" id="firstname" value="<?= $user->fullname ?>" />	
                <input name="email" id="email"  value="<?= $user->email ?>" />
                 <input name="phone"   value="132465798" />
                 
                
                 
				<input  name="productinfo" type="text" value="<?=$v['CauseTitle'] ?>"  />		
						
							<?php $d_amount = $v['MinDonation'];
							$ttlamount = $d_amount + $ttlamount;?>
                            
                            <input  name="amount" type="text" value="<?=$ttlamount?>" />
                            <input name="surl" value="<?= $url1 ?>/success" />
                             <input name="furl" value="<?= $url1 ?>/failure" />
					
						<input type="submit" value="save" />
                   
                     <?php } ?>
					 
                     </form>
                     </div>
                     
<script>
$(window).ready(function(){
	$('form#frmdata').submit();
	})
	</script>