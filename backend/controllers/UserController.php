<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\AuthAssignment;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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
        $model = new AuthAssignment();

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()))
        {
         $model->save();
        return $this->redirect(['user/index']);
        } 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
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
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
/*    public function actionAuth()
    {
        return $this->render('auth');
    } 
    */
    public function actionAuthAssignment()
    {
        $model = new \backend\models\AuthAssignment();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('authAssignment', [
            'model' => $model,
        ]);
    }
        public function actionActivate($id)
    {        
        $checkstatus = User::find()->select('status')->where(['id'=>$id])->one();
        if (($model = User::findOne($id)) !== null) {
        if($checkstatus->status== "10"){
        $data = ['User'=>['status'=>'9']];
                if ($model->load($data) && $model->save()){
                return $this->redirect(['user/index']);
            }
        }
        else{
                $data = ['User'=>['status'=>'10']];
                if ($model->load($data) && $model->save()){
                    return $this->redirect(['user/index']);
                }
                
            }
        }
        return $this->renderAjax('activate', [
            'use'=> $use
        ]);

        
    }
   /* public function actionActivate($id)
    {
        if (($model = User::findOne($id)) !== null) {
        $data = ['User'=>['status'=>'10||9']];
            if ($model->load($data)){ 
                /*var_dump($model); exit();
                $model->save();
                return $this->redirect(['user/index']);
            }
        }
        return false;
    }*/
    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['user/index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDel($id)
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
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
