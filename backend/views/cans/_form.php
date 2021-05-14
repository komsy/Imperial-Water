<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\Cans */
/* @var $form yii\bootstrap4\ActiveForm */

$can = ArrayHelper::map(Product::find()->all(), 'id', 'name');
?>

<div class="cans-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

	<?= $form->field($model, 'productId')->dropDownList($can,['prompt'=>'Select Product Name'])->label(false) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput([
        'maxlength' => true,
        'type' => 'number',
        'step' => '0.01'
    ]) ?>

    <?= $form->field($model, 'canImage')->fileInput() ?>

    <?= $form->field($model, 'canStatus')->checkbox() ?>
    
    <?= $form->field($model, 'createdBy')->textInput()->hiddenInput(['value' =>Yii::$app->user->id, 'readonly'=>true])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
