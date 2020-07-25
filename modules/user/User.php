<?php

namespace app\modules\user;

class User extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\user\controllers';
	public $layout	= '@app/themes/admin/layouts/main';
	
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
