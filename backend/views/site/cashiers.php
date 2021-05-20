<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Cashier;
use common\models\User;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
$use = ArrayHelper::map(User::find()->all(), 'id', 'username');
$user = Cashier::find()->joinWith('user')->all();

?> 
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Cashier</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="cashier">

                <?php $form = ActiveForm::begin(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'userId')->dropDownList($use,['prompt'=>'Select User Cashier']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'fullName') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'contactNumber') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'alternativeNumber') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'address1') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'address2') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'city') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'state') ?>
                        </div>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
            <span>Registered Cashiers</span>
            </h4>
             <button type="button" class="btn btn-primary float right" data-toggle="modal"  data-target="#modal-default">
             <i class="fa fa-plus" aria-hidden="true"></i> ADD Cashier </button>
          
        </div>
      </div>
    </section>

    <!-- <div class="row">
      <div class="col-md-6">
        <form action=" {{ url('registered-user') }} " method="GET">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <select name="roles" class="form-control">
                  @if(isset($_GET['roles']))           
                    <option value=" {{ $_GET['roles']}} "> {{ $_GET['roles'] }} </option>   
                    <option value="">Default</option>
                    <option value="admin">Admin</option>
                    <option value="vendor">Vendor</option>
                  @else
                    <option value="">Default</option>
                    <option value="admin">Admin</option>
                    <option value="vendor">Vendor</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-primary py-2"> Filter</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <div class="card p-3">          
          <h5>
            total users
          </h5>
        </div>
      </div>
    </div> -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              
              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($user as $list) {?> 
                  <tr>
                    <td> <?=$list->cashierId ?> </td>
                    <td> <?=$list->fullName ?> </td>
                    <td> <?=$list->user->email ?> </td>
                    <td class="text-center"> 
                      <?php if($list->role == '1') 
                        echo '<label class="py-2 px-3 badge btn-primary">Approved Cashier</label>';                      
                        else
                        echo '<label class="py-2 px-3 badge btn-danger">Not Approved</label>'; 
                        ?>
                    </td>
                    
                    <td>
                     <a href="<?=Url::to(['site/update', 'id'=>$list->cashierId])?>"><button type="button" class="badge badge-pill btn-primary px-3 py-2 ">Edit</button></a>

                      <a href="#" baseUrl="<?= Yii::$app->request->baseUrl?>" id="<?=$list->cashierId?>" class="badge badge-pill btn-danger px-3 py-2 delet"> Delete </a>
                    </td>
                  </tr>
                <br>                 
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


