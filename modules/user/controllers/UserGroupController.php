<?php

namespace app\modules\user\controllers;

use Yii;
use app\models\AuthItem;
use app\models\AuthItemChild;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * UserGroupController implements the CRUD actions for AuthItem model.
 */
class UserGroupController extends Controller
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
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItem::find()->where(['type'=>'1']),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();
		$add2admin	=	AuthItem::find()->where(['type'=>'2'])->all(); 
		
		
	

        if ($model->load(Yii::$app->request->post())) {
			$model->type	=	'1';
			$model->save();
			
			$parent	=	$model->name;
			$Childs	=	$model->child;
			
			/**** add new Role under admin	****/
			
			$UnderAdmin			=	new AuthItemChild();
			$UnderAdmin->parent	=	'admin';
			$UnderAdmin->child	=	$model->name;
			$UnderAdmin->save();
			
			/**** add each permission under new Role ****/
			
			foreach($Childs	as	$c){
				$Child			=	new AuthItemChild();
				$Child->parent	=	$model->name;
				$Child->child	=	$c;
				$Child->save();
			}
			
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
				'add2admin'=>$add2admin,
				
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$add2admin	=	AuthItem::find()->where(['type'=>'2'])->all();
		$perm		=	AuthItemChild::find()->where(['parent'=>$id])->all();
		
		$model->child = ArrayHelper::getColumn($perm,'child');
		

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           
		   $Childs	=	$model->child;
		  	
			foreach($perm as $del){
				
			$delete	=	$del->delete();
			}
			
		   foreach($Childs	as	$c){
				$Child			=	new AuthItemChild();
				$Child->parent	=	$model->name;
				$Child->child	=	$c;
				$Child->save();
			}
			
			
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
				'add2admin'=>$add2admin,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
