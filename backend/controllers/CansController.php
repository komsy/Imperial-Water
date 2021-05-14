<?php

namespace backend\controllers;

use Yii;
use common\models\Cans;
use backend\models\CansSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CansController implements the CRUD actions for Cans model.
 */
class CansController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'update', 'create', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cans models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CansSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cans model.
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
     * Creates a new Cans model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cans();
       if ($model->load(Yii::$app->request->post()))
       {
            $model->productId = $model->productId;
            $model->type = $model->type;
            $model->amount = $model->amount;
            //generates images with unique names
            $imageName = bin2hex(openssl_random_pseudo_bytes(10));
            $model->canImage = UploadedFile::getInstance($model, 'canImage');
            //saves file in the root directory
            $fullPath = Yii::getAlias('@frontend/web/storage/cans/' .$imageName.'.'.$model->canImage->extension);
            
            $model->canImage->saveAs($fullPath);
           //save in the db
                $model->canImage='cans/'.$imageName.'.'.$model->canImage->extension;
            $model->canImage = $model->canImage;
          /*var_dump($model); exit();*/
          $model->save();


            return $this->redirect(['cans/index']);
       }
       return $this->render('create', [
           'model' => $model,
       ]);
   }

    /**
     * Updates an existing Cans model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
   {
       $model = $this->findModel($id);
       if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['view', 'id' => $model->canId]);
       }
       return $this->render('update', [
           'model' => $model,
       ]);
   }

    /**
     * Deletes an existing Cans model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cans model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cans the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cans::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
