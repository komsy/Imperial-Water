<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model fcommon\models\User */

$this->title = 'Update User: ' . $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cashierId, 'url' => ['view', 'cashierId' => $model->cashierId]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="content-wrapper">
	<section class="content pt-4">
		<div class="Cashier-update">

		    <h1><?= Html::encode($this->title) ?>
		    <a href="<?= Url::to(['site/users'])?>" class="badge bg-danger p-2 text-white float-right">Back</a></h1>

		    <?= $this->render('edit', [
		        'model' => $model,
		    ]) ?>
		</div>
</section>
</div>
