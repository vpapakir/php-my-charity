<?php

namespace app\modules\volunteer\controllers;

use Yii;
use app\modules\volunteer\models\Volunteer;
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
                        'roles' => ['volunteer'],
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
       $model	=	Volunteer::find()->where('UserId	='.$UserId)->One();

        return $this->render('index', [
										'model'	=>$model
           
        ]);
    }


    public function actionMyHistory()
    {	
	   $UserId	=	Yii::$app->user->identity->id;

	   // $VolunteerId	=	Volunteer::find()->where('UserId	='.$UserId)->One();


	    $dataProvider = new ActiveDataProvider([
            'query' => Donation::find()->where(['DonationBy'=>$UserId]),
        ]);

        return $this->render('history', [
            'dataProvider' => $dataProvider,
        ]);
      

        
    }

    public function actionMyFavs()
    {	
	   $UserId	=	Yii::$app->user->identity->id;

	    $VolunteerId	=	Volunteer::find()->where('UserId	='.$UserId)->One();


	    $dataProvider = new ActiveDataProvider([
            'query' => Promotion::find()->where(['Promoter'=>$VolunteerId['Id']])->andwhere(['Status'=>'Active']),
        ]);

        return $this->render('favourites', [
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
			
			  	$model->file->saveAs('ProfilePic/volunteer/' . $model->ProfilePic);
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
        if (($model = Volunteer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionCreateCause()
    {
        $model = new Cause();

        if ($model->load(Yii::$app->request->post())) {
			
				$user = Yii::$app->user->identity;
				
				$model->RegisterBy = $user->id;
				
				$model->file 	   = 	UploadedFile::getInstance($model, 'file');
		 		$model->Image	   =	$model->file->baseName.'.'.$model->file->extension;
				$model->save();
			
			  	$model->file->saveAs('ProfilePic/volunteer/' . $model->Image);
            return $this->redirect(['view-cause', 'id' => $model->CauseId]);
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
	

	 public function actionPromote($cause,$user)
    {
      		 $Volunteer	=	Volunteer::find()->where('UserId	='.$user)->One();
			 
			 $model  = new Promotion();
			 
			 $model->CuaseId = $cause;
			 $model->Promoter = $Volunteer['Id'];
			 $model->Unique   = $cause.$Volunteer['Id'];
			$save = $model->save();
			if($save){
				
				Yii::$app->session->setFlash('promoterapply');
				return $this->redirect(['../site/detail-view', 'id' => $cause]);
				
				}
			else {
				Yii::$app->session->setFlash('promoterexist');
				
				return $this->redirect(['../site/detail-view', 'id' => $cause]);
				}

    }
	
}
