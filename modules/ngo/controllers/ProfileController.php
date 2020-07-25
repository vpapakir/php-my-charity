<?php

namespace app\modules\ngo\controllers;

use Yii;
use app\modules\ngo\models\Ngo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\User;
use app\models\LoginForm;
use app\modules\ngo\models\Cause;
use app\modules\ngo\models\CauseSearch;
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
                        'roles' => ['ngo'],
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
           $model	=	Ngo::find()->where('UserId	='.$UserId)->One();
       
        return $this->render('index', [
										'model'	=>$model
           
        ]);
    }


   public function actionMyDonation()
    {	
	   $UserId	=	Yii::$app->user->identity->id;

	   $Ngo	=	Ngo::find()->where('UserId	='.$UserId)->One();

	    $Cause	=	Cause::find()->where(['NgoName'=>$Ngo['Id']])->all();

	    	 $CauseIds  = [];
	    foreach ($Cause as $key => $value) {
	    			
	    			$CauseIds[]= $value['CauseId'];
	    }

	    $id_all = implode(',', $CauseIds);

	    if($id_all != ''){
	    	$c_ids = $id_all;
	    }
	    else{

	    	$c_ids = 0;
	    }


	    $dataProvider = new ActiveDataProvider([
            'query' => Donation::find()->where("CauseId in ($c_ids)"),
        ]);

        return $this->render('history', [
            'dataProvider' => $dataProvider,
        ]);
      

        
    } 

    public function actionMyFollowers()
    {	
	    $UserId	=	Yii::$app->user->identity->id;

	    $Ngo	=	Ngo::find()->where('UserId	='.$UserId)->One();

	    $Cause	=	Cause::find()->where(['NgoName'=>$Ngo['Id']])->all();

	    	 $CauseIds  = [];
	    foreach ($Cause as $key => $value) {
	    			
	    			$CauseIds[]= $value['CauseId'];
	    }

	    $id_all = implode(',', $CauseIds);

	    if($id_all != ''){
	    	$c_ids = $id_all;
	    }
	    else{

	    	$c_ids = 0;
	    }


	    $dataProvider = new ActiveDataProvider([
            'query' => Promotion::find()->where("CauseId in ($c_ids)")->andwhere(['Status'=>'Active']),
        ]);

        return $this->render('favourites', [
            'dataProvider' => $dataProvider,
        ]);
      

        
    }
   
	
	public function actionProfilePic($id)
	{
		 $model = $this->findModel($id);
			if ($model->load(Yii::$app->request->post())) 
			{
				$model->file 	= 	UploadedFile::getInstance($model, 'file');
		 		$model->ProfilePic	=	$model->file->baseName.'.'.$model->file->extension;
				$model->save();
			
			  	$model->file->saveAs('ProfilePic/ngo/' . $model->ProfilePic);
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
        if (($model = Ngo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionCreateCause()
    {
        $model = new Cause();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			
			
			$user = Yii::$app->user->identity;
			
			$Ngo  = Ngo::find()->where(['UserId'=>$user->id])->one();
				
				$model->RegisterBy = $user->id;
				$model->NgoName    = $Ngo['Id'];
				if($model->file)
				{
					$model->file 	   = 	UploadedFile::getInstance($model, 'file');
			 		$model->Image	   =	$model->file->baseName.'.'.$model->file->extension;

				  	$model->file->saveAs('Cause/' . $model->Image);
			 	}
			 	$model->StartDate = date('Y-m-d', strtotime($model->StartDate));
			 	$model->EndDate = date('Y-m-d', strtotime($model->EndDate));

				$model->save();
				
				$admin	=	Yii::$app->params['adminEmail'];
				Yii::$app->mailer->compose()
				->setFrom($Ngo['Email'])
				->setTo($admin)
				->setSubject('New Cause ')
				->setHtmlBody("New Cause Created by ". $Ngo['NgoName'])
				
				->send();

				
            return $this->redirect(['view', 'id' => $model->CauseId]);
        } else {
            return $this->render('create-cause', [
                'model' => $model,
            ]);
        }
    }
	
	  public function actionManageCause()
    {
        $searchModel = new CauseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('manage-cause', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	 public function actionView($id)
    {
        return $this->render('view-cause', [
            'model' => $model = Cause::findOne($id),
        ]);
    }
}
