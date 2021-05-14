<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Modal;
use common\models\User;
use common\models\Product;
use common\models\Pos;
use yii\jui\AutoComplete;


/* @var $this yii\web\View */
$use = ArrayHelper::map(Product::find()->all(), 'id', 'name');
$list = Pos::find()->where(['status'=>'0'])->all();
$product = Product::find()->all();
$session = Yii::$app->session;

?> 

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add POS</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="cashier">
                <?php $form = ActiveForm::begin(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'productName')->dropDownList($use,['prompt'=>'Select Product to Sell']) ?>
                        </div>
                        <div class="col-md-6">
                          <?= $form->field($model, 'quantity') ?>
                        </div>
                        <div class="col-md-6">
                          <?= $form->field($model, 'createdBy')->hiddenInput(['value' =>Yii::$app->user->id, 'readonly'=>true])->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                      <?= Html::submitButton('Submit', ['class' => 'btn btn-primary float-right']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div><!-- cashier -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!--Main layout-->
 <div class="content-wrapper">
    <section class="content pt-4">
    <section class="mb-4">
      <div class="card">
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="<?= Url::to(['site/index'])?>" target="_blank">Home Page</a>
            <span>/</span>
            <span>Point of Sale</span>
            </h4>  
            <button type="button" class="btn btn-primary float right" data-toggle="modal"  data-target="#modal-default">
             <i class="fa fa-plus" aria-hidden="true"></i> ADD POS </button>
             <a href="<?= Url::to(['cashier/deleted'])?>"><button type="button" class="btn btn-danger float right">
             Deleted Records </button>  </a>    
        </div>
      </div>
    </section>

      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="card shadow">
                <div class="card-body"> 
                <div class="row text-center" >
                  <div class="col" > 
                      <button class="btn btn-success info" style="width: 100%; background-color: green;"> Product Prices </button>
                  </div>
                </div>             
                  <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th >Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($product as $prod) {?> 
                      <tr>
                        <td> <?=$prod->name ?> </td>
                        <td> Kshs.<?=$prod->price ?> </td>
                      </tr>            
                     <?php } ?>
                    </tbody>
                  </table>
                  <!-- pagination  -->   
                </div>
              </div>   
            </div>
            <div class="col-md-9">
              <div class="card shadow">
                <div class="card-body">              
                  <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th >Price</th>
                        <th>Total Amount</th>
                        <th>Created At</th>
                        <th >Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($list as $use) {?> 
                      <tr>
                        <td> <?=$use->posId ?> </td>
                        <td> <?=$use->productName ?> </td>
                        <td> <?=$use->quantity ?> </td>
                        <td> Kshs.<?=$use->price ?> </td>
                        <td> Kshs.<?=$use->totalAmount ?> </td>
                        <td> <?=$use->createdAt ?> </td>
                        
                        <td>
                        <a href="#" baseUrl="<?= Yii::$app->request->baseUrl?>" id="<?=$use->posId?>" class="badge badge-pill btn-danger px-3 py-2 delete"> Delete </a>
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
        </div>
      </div>
    </section>
  </div>
<!--Main layout-->