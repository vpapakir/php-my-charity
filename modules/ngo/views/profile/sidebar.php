<?php
use app\modules\ngo\models\Ngo;
use app\models\Commission;

$UserId			=	Yii::$app->user->identity->id;	
$ngo			=	Ngo::find()->where(['UserId'=>$UserId])->One();



?>


	<div class="col-md-3">
			<!-- Categories Links Starts -->
				<h3>Profile Options</h3>
				<div class="list-group">
					<a href="<?= Yii::getAlias('@web'); ?>/ngo/profile/index" class="list-group-item list1">
						<i class="fa fa-chevron-right"></i>
						My Profile
					</a>
					<a href="<?= Yii::getAlias('@web'); ?>/ngo/profile/update?id=<?=$ngo['Id']; ?>" class="list-group-item list1 ">
						<i class="fa fa-chevron-right"></i>
						Edit Profile
					</a>

                    <a href="<?= Yii::getAlias('@web'); ?>/ngo/profile/change-password?id=<?=$ngo['Id']; ?>" class="list-group-item list1">
						<i class="fa fa-chevron-right"></i>
						Change Password
					</a>
                    
					
                    <a href="<?= Yii::getAlias('@web'); ?>/ngo/profile/create-cause" class="list-group-item list1">
						<i class="fa fa-chevron-right"></i>
						Register New Cause
					</a>
                    
                    <a href="<?= Yii::getAlias('@web'); ?>/ngo/profile/manage-cause" class="list-group-item list1">
						<i class="fa fa-chevron-right"></i>
						Manage Cause
					</a>
                    
                    
                      <a href="#" class="list-group-item">
						<i class="fa fa-star"></i>
						My Account 
					</a>
                   
                     <a href="<?= Yii::getAlias('@web'); ?>/ngo/profile/my-donation" class="list-group-item">
						<i class="fa fa-money"></i>
						My Donation History
					</a>
                     <a href="<?= Yii::getAlias('@web'); ?>/ngo/profile/my-followers" class="list-group-item">
						<i class="fa fa-star"></i>
						My Followers
					</a>
                     <a href="#" class="list-group-item">
						<i class="fa fa-star"></i>
						My Pages
					</a>
                     <a href="#" class="list-group-item">
						<i class="fa fa-star"></i>
						My Impact
					</a>
                  
                    
					
			
						
                	
				</div>
			<!-- Categories Links Ends -->
			
			</div>
   