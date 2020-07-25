<?php
use ijackua\sharelinks\ShareLinks;
use yii\helpers\Html;

/**
 * @var yii\base\View $this
 */

?>

<div class="socialShareBlock">
<ul class="soc">
  <li>  <?=
    Html::a('<i class="fa fa-facebook"></i>', $this->context->shareUrl(ShareLinks::SOCIAL_FACEBOOK),
        ['title' => 'Share to Facebook','class'=>"soc-facebook"]) ?>
        </li>
   <li> <?=
    Html::a('<i class="fa fa-twitter"></i>', $this->context->shareUrl(ShareLinks::SOCIAL_TWITTER),
        ['title' => 'Share to Twitter','class'=>"soc-twitter" ]) ?>
        </li>

  <li>  <?=
    Html::a('<i class="fa fa-google-plus"></i>', $this->context->shareUrl(ShareLinks::SOCIAL_GPLUS),
        ['title' => 'Share to Google Plus','class'=>"soc-google"]) ?>
        </li>

          <li>  <?=
    Html::a('<i class="fa fa-linkedin"></i>', $this->context->shareUrl(ShareLinks::SOCIAL_LINKEDIN),
        ['title' => 'Share to LinkedIn','class'=>"soc-linkedin"]) ?>
        </li>
  </ul>
</div>