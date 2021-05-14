<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model backend\models\Cans */
/* @var $form yii\widgets\ActiveForm */

$can = ArrayHelper::map(Product::find()->all(), 'id', 'name');
?>
        <div class="cans-form">

            <?php $form = ActiveForm::begin(['id' => 'product-create'],[
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>

            <?= $form->field($model, 'productId')->dropDownList($can,['prompt'=>'Select Product Name'])->label(false) ?>

            <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'amount')->textInput() ?>

            <?= $form->field($model, 'canImage')->fileInput() ?>
            <img src="<?php echo $model->getImageUrl() ?>" class="center" width="50px"  alt="Product Image"> 
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
