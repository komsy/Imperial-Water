<?php


use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Update User: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-wrapper">
	<section class="content pt-4">
		<div class="user-update">

		    <h1><?= Html::encode($this->title) ?><a href="<?= Url::to(['user/index'])?>" class="badge bg-danger p-2 text-white float-right">Back</a></h1>

		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
		</div>
</section>
</div>