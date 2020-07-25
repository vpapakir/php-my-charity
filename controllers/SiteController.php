<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\LoginLog;
use app\modules\volunteer\models\Cause;
use app\modules\volunteer\models\CauseSearch;
use app\modules\admin\models\Ngo;
use app\modules\admin\models\Post;
use app\modules\admin\models\Comment;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
           /* 'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
	
	
	
	

    public function actionIndex()
    {
       $model = new Cause();
        return $this->render('index',['model'=>$model]);
    }

    public function actionThankyou()
    {
        return $this->render('thankyou');
    }

     public function actionSearch()
    {
        
        extract($_REQUEST);
        $title = $Cause["CauseTitle"];
        $ngo   = $Cause["NgoName"];
        $reason = $Cause["Reason"];
        $PrimaryArea = $Cause["PrimaryArea"];
        $State  = $Cause["State"];
        $minAmt = $Cause["minAmt"];
        $maxAmt = $Cause["maxAmt"];
        $Ngo_all   = Ngo::find()->where(['State'=>$State])->all();
       
        $ngo_names =[];
        foreach($Ngo_all as $n){

            $ngo_names[]= $n['Id'];
        }

       $ngo_id = implode(',', $ngo_names);
      if($ngo_id != ''){
        $cause_ngo = $ngo_id;
      }else{
        $cause_ngo = 0;

      }

        $model = Cause::find()
                        ->FilterWhere(['like', 'CauseTitle', $title])
                        ->orwhere(['NgoName'=>$ngo])
                        ->orwhere(['Reason'=>$reason])
                        ->orwhere(['PrimaryArea'=>$PrimaryArea])
                        ->orwhere("NgoName In($cause_ngo)")
                        ->orwhere("DonationRequired between $minAmt and $maxAmt")
                        ->all();
      
      
        return $this->render('search', [
           'model'=>$model,
        ]);
    }



    public function actionCause()
    {
        return $this->render('cause');
    }

     public function actionDetailView($id)
    {
       $model  = Cause::findOne($id);
       
        return $this->render('detail-view', [
            'model' =>$model,
        ]);
    }   

    public function actionBlog()
    {
        return $this->render('blog');
    }

     public function actionDetailPost($id)
    {
       $model  = Post::findOne($id);
       $comment= new Comment();

    if ($comment->load(Yii::$app->request->post())) {

        $comment->post_id = $id;

        $comment->save();

         Yii::$app->session->setFlash('commentSubmitted');

         return $this->render('detail-post', [
            'model' =>$model,
            'comment'=>$comment,
        ]);
    }
       
        return $this->render('detail-post', [
            'model' =>$model,
            'comment'=>$comment,
        ]);
    }   

   /* public function actionLogin()
    {
		$this->layout ='@app/themes/admin/layouts/login';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		
			
        $model = new LoginForm(['scenario' => 'login']);
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
			
			 $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
			foreach($roles as $role){
				$path = $role->name;
				if($path == 'admin'){
				return $this->redirect('../admin');
					}
			else{ 
					return $this->redirect($path);
					}
			}
			
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }*/

    public function actionLogout()
    {
        	

      		Yii::$app->user->logout();

      		
      		 return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

     public function actionWhyUs()
    {
        return $this->render('why-us');
    }

     public function actionWhatWeDo()
    {
        return $this->render('what-we-do');
    }

     public function actionHelpUs()
    {
        return $this->render('help-us');
    }
	
	public function actionLogin()
    {
	
      if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		
			
        $model = new LoginForm(['scenario' => 'login']);
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
			
			 $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
			foreach($roles as $role){
				if($role->name != 'admin')
				{
					$path = '../'.$role->name. '/profile';
				}
				else if($role->name == 'admin')
				{
					$path = '../'.$role->name;
//					return $this->redirect('logout');
				}
				
			return $this->redirect($path);
					
			
			}
			
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionAdmin()
    {
	
	$this->layout = '@app/themes/admin/layouts/login';
	
      if (!\Yii::$app->user->isGuest) {
            return $this->redirect('../admin');
        }
		
			
        $model = new LoginForm(['scenario' => 'login']);
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
			
			 $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
			foreach($roles as $role){
				if($role->name != 'admin')
				{
					return $this->redirect('logout');
				}
				else
				{
					$path = '../'.$role->name;
				}
				
			return $this->redirect($path);
					
			
			}
			
        } else {
            return $this->render('admin-login', [
                'model' => $model,
            ]);
        }
    }
	

	
	



    public function actionAdd2cart($id)
    {
        $pid         = \Yii::$app->getRequest()->getCookies()->getValue('pid'); //cookies collection of cause ids
        
               if($pid!= NULL && in_array($id,$pid))
                {
                   return $this->redirect('@web/site/cart');    
                }//end if
               else
                 {   
                     $pid[]             =   $id;    // product ids array

       				 /********** cookies for cause ids *********/
        
        			$Pcookie =   new \yii\web\Cookie([
                                'name' =>    'pid',
                                 'value' => $pid,
                                 'expire'=>  time() + (60*60*24),
                                    ]);
       			 	Yii::$app->getResponse()->getCookies()->add($Pcookie); // add cause ids to cookies
                                            
        
       			 	return $this->redirect('@web/site/cart');
   				}

    }
    
    
    public function actionRemove2cart($id,$url)
    {
      
       $pid   = \Yii::$app->getRequest()->getCookies()->getValue('pid');
     
	// remove id of cause from array
      		 if($pid!= NULL && in_array($id,$pid))
				{
						$key					 = 	array_search($id,$pid);
						
						unset($pid[$key]); 
				}//end if
             
         $pid       =   array_values($pid);     //Re-indexing  of array after removing id from pidroduct array
         
         /**** 
         =store remaining pid array in cookies
         =it will update the previous cookis values 
         ****/
        $Pcookie =   new \yii\web\Cookie([
                                'name' =>    'pid',
                                 'value' => $pid,
                                 'expire'=>  time() + (60*60*24),
                                    ]);
        Yii::$app->getResponse()->getCookies()->add($Pcookie);
        
        return $this->redirect($url);
       
    }
    
    ////********* view cart item ***************//////////////
    
    public function actionCart(){
        
        return $this->render('cart');
        
        
    }


	
}