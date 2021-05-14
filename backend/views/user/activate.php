<?php 

/** @var $use \common\models\user */
use yii\helpers\Url;
?>

<a 
	href="<?=Url::to(['user/activate', 'id'=>$use->user->id]) ?>" data-method="post" data-pjax="1">
QWWE
<?php if($use->user->status == '9') 
    echo '<label class="py-2 px-3 badge btn-primary">Activate</label>';                      
    elseif($use->user->status == '10')
    echo '<label class="py-2 px-3 badge btn-danger"> Deactivate</label>'; 
?></a>