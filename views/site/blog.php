<?php
use app\modules\admin\models\Cause;
use ijackua\sharelinks\ShareLinks;
use \yii\helpers\Html;

use app\modules\admin\models\Post;


?>

  <section class="our-causes">
      <div class="container">
      
      
        <div class="row">
      
      
       
          <div class="col-xs-12">
            <div class="page-header section-header clearfix">
              <h1>Our Latest. <strong>Posts</strong></h1>
            </div>
            <div class="row">
                <?php $Post = Post::find()->where(['status'=>'Published'])->all(); 
                    foreach($Post as $v)
                    {
                      if(trim($v['image']) == '')
                      {
                        $image = 'default.jpg';
                      }
                      else
                      {
                        $image = $v['image'];
                      }
                     
                      ?>
                      <div class="col-sm-12" style="margin-bottom: 35px;">
                        <div class="col-sm-3">
                          <a href="#" class="img-thumb">
                            <figure>
                              <img style="border:#ccc solid 2px; border-radius: 5px;" src="<?= Yii::getAlias('@web'); ?>/Post/<?=$image ?>" class="attachment-charity_causes_thumb wp-post-image" alt="<?= $v['image'] ?>" />
                            </figure>
                           
                          </a>
                        </div>
                        <div class="col-s-9">
                          <b style="text-transform: capitalize; font-size: 16px;"><?= $v['title']; ?></b>
                          <p>
                            <?= substr($v['content'], 0, 210); ?>
                          </p>
                         
                          <?=ijackua\sharelinks\ShareLinks::widget([
                          'viewName' => '@app/views/site/shareLinks.php'
                          ]);
                          ?>
                          <span style="float:right">
                           <a href="<?= Yii::getAlias('@web'); ?>/site/detail-post?id=<?=$v['id']?>" class="btn btn-info">Comment </a>
                           <a href="<?= Yii::getAlias('@web'); ?>/site/detail-post?id=<?=$v['id']?>" class="btn btn-primary">Read More</a></span>
                         
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
   
           
    
   