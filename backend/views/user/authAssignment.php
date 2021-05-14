<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */
/* @var $form ActiveForm */
?>
<div class="authAssignment">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'item_name') ?>
        <?= $form->field($model, 'user_id') ?>
        <?= $form->field($model, 'created_at') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- authAssignment -->
