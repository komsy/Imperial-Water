<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Cashier;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Cashier */
/* @var $form ActiveForm */
$use = ArrayHelper::map(Cashier::find()->all(), 'cashierId', 'fullName');
?>
 
        <div class="cashier">

            <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'cashierId')->dropDownList($use,['prompt'=>'Select User Cashier']) ?>

                    <?= $form->field($model, 'fullName') ?>

                    <?= $form->field($model, 'role') ?> 
                    
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>

        </div><!-- cashier -->