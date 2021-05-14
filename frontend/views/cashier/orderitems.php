<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use yii\helpers\StringHelper;
use common\models\Orders;
use common\models\OrderItem;
use common\models\Order_address;
use common\models\Product;
use yii\bootstrap4\ActiveForm;
use common\models\User;

$orders= Orders::find()->joinWith('orderAddress')->joinWith('orderItem')->joinWith('createdBy')->all();
?>
<!--Main layout-->
 <div class="content-wrapper">
    <section class="content pt-4">
    <section class="mb-4">
      <div class="card">
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="<?= Url::to(['site/index'])?>" target="_blank">Home Page</a>
            <span>/</span>
            <span>Orders</span>
            </h4>         
        </div>
      </div>
    </section>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              
              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Delivery </th>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    <th>Order Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($orders as $use) {?> 
                  <tr>                    
                    <td> <?=$use->id ?> </td>
                    <td> <?=$use->id ?> </td>
                    <td> <?=$use->firstname ?> <?=$use->lastname ?>  </td>
                    <td> <?=$use->total_price?> </td>
                    <td class="text-center"> 
                      <?php if($use->status == '0') 
                        echo '<label class="py-2 px-3 badge btn-danger">Pending </label>';                      
                        if($use->status == '1')
                        echo '<label class="py-2 px-3 badge btn-primary">Processing </label>';                     
                        elseif($use->status == '2')
                        echo '<label class="py-2 px-3 badge btn-success">Delivered </label>';  
                      ?>
                    </td>
                    <td> <?=$use->created_at ?> </td>
                    <td>
                      <a href="#" baseUrl="<?= Yii::$app->request->baseUrl?>" id="<?=$use->id?>" class="badge badge-pill btn-success px-3 py-2 orderupdate"> Update </a>
                    </td>
                  </tr>               
                 <?php } ?>
                </tbody>
              </table>
              <!-- pagination  -->               
              </div>
            </div>
          </div>
        </div>
<!--Main layout-->
</section>
</div> 