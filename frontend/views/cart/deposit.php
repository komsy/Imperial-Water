<?php 

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use common\models\Orders;
use common\models\Orderitems;

/*var_dump($record->delivery->location); exit();*/
?>

<div class="row">
  <div class="col">
    <h4 class=" text-center" style="font-weight: bold;">Imperial Water Refilling System </h4>
    <h6 class="text-muted">Trusted payment, 100% Money Back Guarantee</h6>
    <form action="#">
        <!-- Input trigger order now modal -->
     <img src="<?= Yii::$app->request->baseUrl ?>/img/mpesa.png?>" class="modelsit" width="200px" >
      <br>
    </form>

    <hr class="line">
       <p class="text-center" style="font-weight: bold;">Enter Your MPESA PIN on prompt pop-up on your phone to complete the payment</p>

    <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'MerchantRequestId')->hiddenInput(['value' =>Yii::$app->user->id, 'readonly'=>true])->label(false) ?>
      <?= $form->field($model, 'orderId')->textInput(['value' =>$order->id, 'readonly'=>true])->label(false) ?>
      <?= $form->field($model, 'createdBy')->hiddenInput(['value' =>Yii::$app->user->id, 'readonly'=>true])->label(false) ?>
      <?= $form->field($model, 'transAmount')->textInput(['value' =>$ordertt->total_price, 'readonly'=>true])->label(false) ?>
      <?= $form->field($model, 'mpesaNumber') ?>
  
      <div class="form-group">
          <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
      </div>
    <?php ActiveForm::end(); ?>
  </div>
</div>