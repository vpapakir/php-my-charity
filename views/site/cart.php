<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\Cause;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Your Cart';
$this->params['breadcrumbs'][] = $this->title;
$url=	Yii::$app->controller->action->id;

$db = Yii::$app->db;


 $value = \Yii::$app->getRequest()->getCookies()->getValue('pid');
 if(count($value)>0){
$id_all = implode(',',$value);

	$ids = $id_all;
	}
	else
	{
		$ids = '0';
		}

$query = "select * from tbl_cause where `CauseId` in ($ids)";
$command = $db->createCommand($query)->queryAll();



?>
<div class="container">
<!-- Shopping Cart Table Starts -->
		<div class="table-responsive shopping-cart-table">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td class="text-center">
							Image
						</td>
						<td class="text-center">
							 Title
						</td>							
						<td class="text-center">
							Description
						</td>
						<td class="text-center">
							Min Donation
						</td>
						
						<td class="text-center">
							Action
						</td>
					</tr>
				</thead>
				<tbody>
                <?php
				$ttlamount = 0;
               foreach($command as $v)
				{ 
				if($v['Image'] == ''){
					$imgs = 'default.jpg';
					}else{
						$imgs = $v['Image'];
						}
				?>
					<tr>
						<td class="text-center">
							<a href="<?=Yii::getAlias('@web'); ?>/site/product?id=<?=$v['CauseId'];?>">
								<img src="<?= Yii::getAlias('@web'); ?>/Cause/<?=$imgs?>" alt="Product Name" title="<?=$v['CauseTitle'] ?>" class="img-thumbnail "  style="width:150px"/>
							</a>
						</td>
						<td class="text-center">
							<a href="<?=Yii::getAlias('@web'); ?>/site/product?id=<?=$v['CauseId'];?>">
							<?=$v['CauseTitle'] ?>
                            </a>
						</td>							
						<td class="text-center">
						<?=$v['CauseDescription'] ?>		
						</td>
						<td class="text-center">
							Rs. <?php $d_amount = $v['MinDonation'];
							$ttlamount = $d_amount + $ttlamount;
							echo $d_amount; ?>
						</td>
						
						<td class="text-center">
							<a href="<?=Yii::getAlias('@web'); ?>/site/remove2cart?id=<?=$v['CauseId'];?>&url=<?=$url ?>" class="btn btn-default tool-tip">
								<i class="fa fa-times-circle"></i>
							</a>
						</td>
					</tr>
                   
                     <?php } ?>
											
				</tbody>
				<tfoot>
					<tr>
					  <td colspan="4" class="text-right">
						<strong>Total :</strong>
					  </td>
					  <td colspan="2" class="text-left">
						Rs. <?= $ttlamount ?>
					  </td>
					</tr>
				</tfoot>
			</table>				
		</div>
	<!-- Shopping Cart Table Ends -->
	<!-- Shipping Section Starts -->
		
			
            <div class="row">
			<!-- Shipping & Shipment Block Starts -->
				<div class="col-md-6">
            
           			 <div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">
								Terms &amp; Conditions
							</h3>
						</div>
						<div class="panel-body">
							<p>
								HTML Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. 
							</p>
							<p>
								Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. 
							</p>
							<p>
								Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat.
							</p>								
						</div>
					</div>
                    
                    </div>
			<!-- Shipping & Shipment Block Ends -->
            
			<!-- Discount & Conditions Blocks Starts -->
				<div class="col-md-3 col-md-offset-3">
                    
                    <div class="panel panel-smart" >
						<div class="panel-heading">
							<h3 class="panel-title" align="right">
								<b>Total</b>
							</h3>
                          
						</div>
                        
						<div class="panel-body">
							<dl class="dl-horizontal">
								
								
								
								
                                
							</dl>
							<hr />
							<dl class="dl-horizontal total">
								<dt>Total:</dt>
								<dd>Rs. <?= $ttlamount ?></dd>
							</dl>
							<hr />
							
							<div class="text-uppercase clearfix">
							<?php if(count($value)>0){ ?>
								<a href="<?=Yii::getAlias('@web'); ?>/site/cause" class="btn btn-default pull-left">
									<span class="hidden-xs">Continue </span>
									
								</a>
								<a href="<?=Yii::getAlias('@web'); ?>/payment/data" class="btn btn-default pull-right">		
									Donate
								</a>
								<?php } ?>
							</div>
							
						</div>
					</div>
                    
                    <!-- Total Panel Ends -->
				</div>
			<!-- Discount & Conditions Blocks Ends -->
			</div>
		
        
	<!-- Shipping Section Ends -->
  </div>
    