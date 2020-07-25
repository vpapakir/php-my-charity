<?php

namespace app\modules\users\controllers;

use Yii;
use app\modules\users\models\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\User;
use app\models\LoginForm;
use app\modules\volunteer\models\Cause;
use app\modules\volunteer\models\CauseSearch;
use app\modules\admin\models\Promotion;
use app\modules\admin\models\Donation;



class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
		
			 'access' => [
                'class' => AccessControl::className(),
                'except' => [''],
                'rules' => [
                    [
                       
                        'allow' => true,
                        'roles' => ['users'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

   
    public function actionIndex()
    {	
	   $UserId	=	Yii::$app->user->identity->id;
       $model	=	Users::find()->where('UserId	='.$UserId)->One();

        return $this->render('index', [
										'model'	=>$model
           
        ]);
    }

    public function actionMyHistory()
    {	
	   $UserId	=	Yii::$app->user->identity->id;

	   // $Users	=	Users::find()->where('UserId	='.$UserId)->One();


	    $dataProvider = new ActiveDataProvider([
            'query' => Donation::find()->where(['DonationBy'=>$UserId]),
        ]);

        return $this->render('history', [
            'dataProvider' => $dataProvider,
        ]);
      

        
    }

    

	
	public function actionProfilePic($id)
	{
		 $model = $this->findModel($id);
	if ($model->load(Yii::$app->request->post())) {
				
				$model->file 	= 	UploadedFile::getInstance($model, 'file');
		 		$model->ProfilePic	=	$model->file->baseName.'.'.$model->file->extension;
				$model->save();
			
			  	$model->file->saveAs('ProfilePic/users/' . $model->ProfilePic);
				return  $this->redirect(['update','id' => $id]);
			}
	}
	
	
	
	
	/********************------Change Paasword-------**********************/
	
	public function actionChangePassword($id)
    {	
		 $model = $this->findModel($id);
		 
		 $user	= new User();
		 
		// $User	=	User::findOne(['id' => $model->UserId, 'status' => '10']);
		 if ($model->load(Yii::$app->request->post())) {
			 
			 $oldpassword	=	$model->oldpassword;
			 $password		=	$model->password;
			
			 $userId		=	Yii::$app->user->identity->id;
			
			$ChangePassword	=	User::find()->where(['id'=>$userId])->One();
				
				$hash		=	$ChangePassword->password_hash;

			 $result 		=	Yii::$app->getSecurity()->validatePassword($oldpassword, $hash);
			
			 $NewPassword	=	Yii::$app->getSecurity()->generatePasswordHash($password);
				if($result)
				{
					
					$ChangePassword->password_hash	=	$NewPassword;
					$confirm						=	$ChangePassword->save();
					if($confirm)
					{
							
								
								Yii::$app->session->setFlash('passwordchanged');
								return  $this->redirect('index');
					}
				 } 
				  else
				  {
					  $model->addError('oldpassword', 'Incorrect old password.');
				  }
			
		 }
			return $this->render('change-password',
							['model'	=>$model]);
		 
    }
	
	 public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
	
	
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	
	
	
}
