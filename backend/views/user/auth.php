<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\AuthAssignment;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
$user = AuthAssignment::find()->all();

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
            <span>Registered Users</span>
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
                    <th>ID</th>
                    <th> item_name</th>
                    <th class="text-center">Role</th>
                    <th >Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($user as $use) {?> 
                  <tr>
                    <td> <?=$use->user_id ?> </td>
                    <td> <?=$use->item_name ?> </td>
                    <td class="text-center"> 
                      h
                    </td>
                    <td>
                     <a href="<?=Url::to(['user/update', 'id'=>$use->user_id])?>"><button type="button" class="badge badge-pill btn-primary px-3 py-2 ">Edit</button></a>
                     
                      <a href="#" baseUrl="<?= Yii::$app->request->baseUrl?>" id="<?=$use->user_id?>" class="badge badge-pill btn-danger px-3 py-2 del"> Delete </a>
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