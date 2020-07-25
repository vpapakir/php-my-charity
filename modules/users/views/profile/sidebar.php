<?php
use app\modules\users\models\Users;
use app\models\Commission;

$UserId			=	Yii::$app->user->identity->id;	
$Users		=	Users::find()->where(['UserId'=>$UserId])->One();



?>


	<div class="col-md-3">
			<!-- Categories Links Starts -->
				<h3>Profile Options</h3>
				<div class="list-group">
					<a href="<?= Yii::getAlias('@web'); ?>/users/profile/index" class="list-group-item list1">
						<i class="fa fa-chevron-right"></i>
						My Profile
					</a>
					<a href="<?= Yii::getAlias('@web'); ?>/users/profile/update?id=<?=$Users['Id']; ?>" class="list-group-item list1 ">
						<i class="fa fa-chevron-right"></i>
						Edit Profile
					</a>

                    <a href="<?= Yii::getAlias('@web'); ?>/users/profile/change-password?id=<?=$Users['Id']; ?>" class="list-group-item list1">
						<i class="fa fa-chevron-right"></i>
						Change Password
					</a>
                    
					
               
                      <a href="#" class="list-group-item">
						<i class="fa fa-star"></i>
						My Account 
					</a>
                    
                    <a href="#" class="list-group-item">
						<i class="fa fa-star"></i>
						My Monthly Giving
					</a>
                    <a href="#" class="list-group-item">
						<i class="fa fa-time"></i>
						My Reminders
					</a>
                     <a href="<?= Yii::getAlias('@web'); ?>/users/profile/my-history" class="list-group-item">
						<i class="fa fa-money"></i>
						My Donation History
					</a>
                     
                     <a href="#" class="list-group-item">
						<i class="fa fa-star"></i>
						My Pages
					</a>
                     <a href="#" class="list-group-item">
						<i class="fa fa-star"></i>
						My Impact
					</a>
                    <a href="#" class="list-group-item">
						<i class="fa fa-star"></i>
						My Giving Basket
					</a>
                    
					
			
						
                	
				</div>
			<!-- Categories Links Ends -->
			
			</div>
   