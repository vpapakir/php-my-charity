<?php
use app\modules\volunteer\models\Volunteer;
use app\models\Commission;

$UserId			=	Yii::$app->user->identity->id;	
$Volunteer			=	Volunteer::find()->where(['UserId'=>$UserId])->One();



?>


	<div class="col-md-3">
			<!-- Categories Links Starts -->
				<h3>Profile Options</h3>
				<div class="list-group">
					<a href="<?= Yii::getAlias('@web'); ?>/volunteer/profile/index" class="list-group-item list1">
						<i class="fa fa-chevron-right"></i>
						My Profile
					</a>
					<a href="<?= Yii::getAlias('@web'); ?>/volunteer/profile/update?id=<?=$Volunteer['Id']; ?>" class="list-group-item list1 ">
						<i class="fa fa-chevron-right"></i>
						Edit Profile
					</a>

                    <a href="<?= Yii::getAlias('@web'); ?>/volunteer/profile/change-password?id=<?=$Volunteer['Id']; ?>" class="list-group-item list1">
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
                     <a href="<?=Yii::getAlias('@web'); ?>/volunteer/profile/my-history" class="list-group-item">
						<i class="fa fa-coin"></i>
						My Donation History
					</a>
                     <a href="<?=Yii::getAlias('@web'); ?>/volunteer/profile/my-favs" class="list-group-item">
						<i class="fa fa-star"></i>
						My Favourites
					</a>
                     <a href="#" class="list-group-item">
						<i class="fa fa-star"></i>
						My Pages
					</a>
                     <a href="#" class="list-group-item">
						<i class="fa fa-star"></i>
						My Impact
					</a>
                    <a href="<?= Yii::getAlias('@web'); ?>/site/cart" class="list-group-item">
						<i class="fa fa-star"></i>
						My Giving Basket
					</a>
                    
					
                    
					
			
						
                	
				</div>
			<!-- Categories Links Ends -->
			
			</div>
   <script>
   $(document).ready(function(){
	 
   $('a .list1').each(function(index, value) { 
    if ($(this).prop("href") === window.location.href) {
        $(this).addClass("active");
    } 
});
   });
</script>