<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
$use = ArrayHelper::map(User::find()->all(), 'id', 'username');
?>
 
        <div class="user-form">

            <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'status')->textInput()->input('status', ['placeholder' => 'Enter either 9 or 10', 'data-toggle'=>"tooltip", 'title'=>"Enter either 9 or 10"]) ?> 
                    
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>

        </div><!-- cashier -->