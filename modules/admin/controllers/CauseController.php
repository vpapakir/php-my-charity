<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Cause;
use app\modules\admin\models\CauseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CauseController implements the CRUD actions for Cause model.
 */
class CauseController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cause models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CauseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cause model.
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
     * Creates a new Cause model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cause();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CauseId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cause model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CauseId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cause model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
		$model->scenario = 'deleted';
		$model->Status = 'Deleted';
		$model->save();
		
	

        return $this->redirect(['index']);
    }
	
	 public function actionStatus($status,$id)
    {
        $model=$this->findModel($id);
		$model->scenario = 'deleted';
		$model->Status = $status;
		$model->save();
		
	

        return $this->redirect(['index']);
    }
	
	public function actionAssignReason($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			
			$model->Status  = 'Active';
			$model->save();
			
			
          return $this->redirect(['index']);
        } else {
            return $this->renderAjax('assign-reason', [
                'model' => $model,
            ]);
        }
    }
	
	 public function actionFeatured($status,$id)
    {
        $model=$this->findModel($id);
		
		$model->Featured = $status;
		$model->save();
		
	

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cause model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cause the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cause::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
