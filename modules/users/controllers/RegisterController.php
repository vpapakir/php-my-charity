<?php

namespace app\modules\users\controllers;

use Yii;
use app\modules\users\models\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\AddUser;

/**
 * RegisterController implements the CRUD actions for Volunteer model.
 */
class RegisterController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Volunteer models.
     * @return mixed
     */
    public function actionIndex()
    {
         $model = new Users(['scenario'=>'register']);
		$model2 = new AddUser();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			
			
			$model2->username = $model->Email;
			$model2->fullname = $model->FirstName.' '. $model->LastName;
            $model2->email = $model->Email;
			
			$model2->password = $model->password;
			$model2->repeatpassword = $model->repeatpassword;
          
			$model2->Role	=	'users';
			$test	=	$model2->adduser();
		
			$model->UserId	=	 $test->id;
		
			$model->save();
			
					$s = base64_encode($model->UserId);
					$key = bin2hex($s);
					$link = "http://ptindia.org/charity/web/volunteer/register/confirm?key=$key";
					$admin	=	Yii::$app->params['adminEmail'];
			
					Yii::$app->mailer->compose()
				->setFrom($admin)
				->setTo($model->Email)
				->setSubject('Registration Varification On Charity')
				->setHtmlBody("please click the below link to varify your account.<br/>
							$link")
				
				->send();
				
			Yii::$app->session->setFlash('userRegister');

            return $this->refresh();
			
			
          //  return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('create', [
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
	
	
	 public function actionConfirm()
    {
        $d = $_REQUEST['key'];
       $key = hex2bin($d);
	   $id = base64_decode($key);
	   $conn  = Yii::$app->db;
	   $query = "update `user` set `status`=10 where `id`= '$id' ";
	   $command = $conn->createCommand($query)->execute();
	   if($command){
		  
		 				 Yii::$app->session->setFlash('emailvarification');
								return  $this->redirect('../../site/login');
		   
		   }else{
			   
			 Yii::$app->session->setFlash('email-not-varified');
			 
			 return $this->goHome();
			   }
	   
	   
    }
}
