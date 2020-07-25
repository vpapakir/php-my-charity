<?php
use app\modules\admin\models\Cause;
use ijackua\sharelinks\ShareLinks;
use \yii\helpers\Html;

if(! Yii::$app->user->isGuest){
$user_id =Yii::$app->user->identity->id;

$roles = Yii::$app->authManager->getRolesByUser($user_id);
foreach($roles as $v){
    $role = $v->name;
    }
}
else{
    $role = 'guest';
    }
?>

<style type="text/css">
.fullwidthabanner {
    height: 460px !important;
}
</style>
     





    <!-- banner slider End Here --> 
         <section class="our-causes">
      <div class="container">
      
      
        <div class="row">
      
      
       
          <div class="col-xs-12">
            <div class="page-header section-header clearfix">
              <h1>Your Search Reasults... </h1>
            </div>
            <div class="row">
                <?php  
                    foreach($model as $v)
                    {
                      if(trim($v['Image']) == '')
                      {
                        $image = 'default.jpg';
                      }
                      else
                      {
                        $image = $v['Image'];
                      }
                      $per =  ($v['DonationCollected']/$v['DonationRequired'])*100;
                      if($per > 100)
                      {
                        $perDon = 100;
                      }
                      else
                      {
                        $perDon =  number_format((float)$per, 2, '.', '');
                      }
                      ?>
                      <div class="col-sm-12" style="margin-bottom: 35px;">
                        <div class="col-sm-3">
                          <a href="#" class="img-thumb">
                            <figure>
                              <img style="border:#ccc solid 2px; border-radius: 5px;" src="<?= Yii::getAlias('@web'); ?>/Cause/<?=$image ?>" class="attachment-charity_causes_thumb wp-post-image" alt="<?= $v['Image'] ?>" />
                            </figure>
                            <div class="progress" style="width: 82%; margin-left: 9%;">
                              <div class="progress-bar" role="progressbar" data-aria-valuenow="<?= $perDon?>%" data-aria-valuemin="0" data-aria-valuemax="100" style="width:<?= $perDon?>&#37;"> <span class="progress-value"><?= $perDon?>% </span> </div>
                            </div>
                          </a>
                        </div>
                        <div class="col-s-9">
                          <b style="text-transform: capitalize; font-size: 16px;"><?= $v['CauseTitle']; ?></b>
                          <p>
                            <?= substr($v['CauseDescription'], 0, 210); ?>
                          </p>
                          <span><b> Donation Collected :  </b> Rs. <?= $v["DonationCollected"] ?></span><br/>
                           <span><b> Donation Required :  </b> Rs. <?= $v["DonationRequired"] ?></span><br/>
                            <span><b> Min Donation :  </b> Rs. <?= $v["MinDonation"] ?></span><br/>
                          <?=ijackua\sharelinks\ShareLinks::widget([
                          'viewName' => '@app/views/site/shareLinks.php'
                          ]);
                          ?>
                          <span style="float:right">
                           <a  class="btn btn-default" onclick="addToCart(<?=$v['CauseId']?>);">DONATE NOW</a>
                           <a href="<?= Yii::getAlias('@web'); ?>/site/detail-view?id=<?=$v['CauseId']?>" class="btn btn-primary">Read More</a></span>
                          <?php if($role === 'volunteer'){?>
                           <span style="float:left">
                           <a href="<?= Yii::getAlias('@web'); ?>/volunteer/profile/promote?cause=<?=$v['CauseId']?>&user=<?=$user_id?>" data-method="post">Promote</a>
                           </span>
                           
                           <?php } ?>
                        </div>
                      </div>
                      <?php
                    }
                ?>
            </div>
            
          </div>
        </div>
      </div>
    </section>
   
           
    
    <?php  if (Yii::$app->session->hasFlash('email-not-varified')): ?>
    <script> alert('Your Key Is either not Valid Or already Used');</script>
    
    <?php endif; ?>


     <script>
function addToCart(Id)
{
  

  jQuery.ajax({
    url: "<?=Yii::getAlias('@web'); ?>/site/add2cart?id="+Id,
    success: function(data)
    {
      alert('Cuase is added to cart');
      
    }
  });
}


</script>