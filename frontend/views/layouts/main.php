<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php')
?>
        <div class="wrap mt-5">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
<?php $this->endContent()?>
