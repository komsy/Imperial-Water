<?php

namespace frontend\controllers;


use Yii;
use yii\filters\VerbFilter;
use common\models\Cans;
use common\models\Product;
use common\models\User;
use common\models\Pos;
use common\models\Orders;

class CashierController extends \yii\web\Controller
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
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    public function actionIndex()
    { 
        $this ->layout='auth';
        $model = New Pos();
        
        if($model->load(Yii::$app->request->post())) {

        $prod = Product::find()->where('id=:productName')->addParams([':productName' => $model['productName']])->all(); 
        
        $total = $prod[0]->price*$model->quantity;
        $model->productName = $prod[0]->name;
        $model->quantity = $model->quantity;
        $model->price = $prod[0]->price;
        $model->createdBy = $model->createdBy;
        $model->totalAmount = $total;
        $model->status = '0';
         $model->save();
            return $this->redirect(['cashier/index']);   
                   }
            return $this->render('index', [
            'model' => $model,
        ]);
    }
      public function actionDeleted()
    {
        $this ->layout='auth';
        return $this->render('deleted');
    } 
    public function actionOrderitems()
    {
        $this ->layout='auth';
        return $this->render('orderitems');
    } 
    public function actionDetails()
    {
        $this ->layout='auth';
        return $this->render('details');
    } 

    public function actionCashier($id)
    {
        $model = New Orders();
        if (($model = Orders::findOne($id)) !== null) {
            $data = ['Orders'=>['status'=>1]];
                /*var_dump($data); exit();*/
                if ($model->load($data)){ 
                    $model->save();
                    return $this->redirect(['cashier/orderitems']);
                }
            }

        return false;
    }
    public function actionUpdate($id)
    {
        $this ->layout='auth';
        $model = $this->findModel($id);
        $totalAmount = (100-$model->discountPercentage)/100*$model->price*$model->quantity;
        $data = ['Pos'=>['productName'=>$model->productName,'quantity'=>$model->quantity,'price'=>$model->price,'discountPercentage'=>$model->discountPercentage,'totalAmount'=>$totalAmount,'status'=>0,'createdBy'=>$model->createdBy]];

            if ($model->load($data)){ 
                $model->save();
            return $this->redirect(['cashier/index']);
        }

        return false;
    }
    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    { 
        $this ->layout='auth';
        $model = $this->findModel($id);
        $totalAmount = (100-$model->discountPercentage)/100*$model->price*$model->quantity;
         $data = ['Pos'=>['productName'=>$model->productName,'quantity'=>$model->quantity,'price'=>$model->price,'discountPercentage'=>$model->discountPercentage,'totalAmount'=>$totalAmount,'status'=>1,'createdBy'=>$model->createdBy]];

            if ($model->load($data)){ 
                $model->save();
            return $this->redirect(['cashier/index']);
        }

        return false;
    }

    protected function findModel($id)
    {   $this ->layout='auth';
        if (($model = Pos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



  

}


        