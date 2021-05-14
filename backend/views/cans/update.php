<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cans */

$this->title = 'Update Cans: ' . $model->canId;
$this->params['breadcrumbs'][] = ['label' => 'Cans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->canId, 'url' => ['view', 'id' => $model->canId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cans-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('edit', [
        'model' => $model,
    ]) ?>

</div>
