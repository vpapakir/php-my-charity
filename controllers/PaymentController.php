<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;


class PaymentController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'except' => [''],
                'rules' => [
                    [
                        
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
         
        ];
    }
   
    public function actionData()
    {
        return $this->render('data');
    }
	
    public function actionIndex()
    {
        return $this->render('index');
    }
	
	 public function actionSuccess()
    {
        return $this->render('success');
    }
	 public function actionFailure()
    {
        return $this->render('failure');
    }


}
