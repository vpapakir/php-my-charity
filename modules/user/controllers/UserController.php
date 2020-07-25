<?php

namespace app\modules\user\controllers;

use Yii;
use app\models\User;
use app\models\AddUser;
use app\models\LoginForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\AuthItem;
use app\models\AuthAssignment;
use yii\filters\AccessControl;
use  yii\web\Session;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                        'roles' => ['admin'],
                    ],
                     [
                        'actions' => ['change-password'],
                        'allow' => true,
                        'roles' => ['@'],
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

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddUser()
    {
        $model = new AddUser();
        $authItem   =   Yii::$app->authManager->getRoles();//AuthItem::find()->all();
        if ($model->load(Yii::$app->request->post())) {
           if($user = $model->adduser()){
               
               return $this->redirect(['index']);
               
           }
                    
           
        }

        return $this->render('create', [
            'model' => $model,
            'authItem'  =>  $authItem,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $connection = Yii::$app->db;
		$model = User::findOne($id);
		$ddl = AuthAssignment::find()->where(['user_id'=>$id])->One();
		$model->Role = $ddl['item_name'];
		
       $authItem   =   Yii::$app->authManager->getRoles();

        if ($model->load(Yii::$app->request->post())  ) {
		
			$model->username = $model->username;
            $model->email = $model->email;
            $model->fullname =   $model->fullname;
			if(trim($model->password)!=''){
            $model->setPassword($model->password);
			}
          
			$model->save();
            
			if($model->Role		!= ''){
				$role = $model->Role;
				$old_role = AuthAssignment::find()->where(['user_id'=>$id])->One();
				
				 if($old_role['user_id'] != ''){
					 
					 $command = $connection->createCommand("update auth_assignment set `item_name`= '$role' where `user_id`='$id'")->execute();
					 
					 }else{
						 
					$command = $connection->createCommand("insert into auth_assignment (item_name,user_id) values('$role','$id')")->execute();
						 }
				
			}
			
			
          return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                 'authItem'  =>  $authItem,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	/************** Change Password *********/
	public function actionChangePassword()
    {	
		// $model = $this->findModel($id);
		 
		 $model	= new LoginForm(['scenario'=>'changePassword']);
		 
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
								Yii::$app->user->logout();

                              
								return $this->redirect('../site/login');
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

     public function actionUserGroup()
    {
       

        return $this->redirect(['../user-group/index']);
    }
}
