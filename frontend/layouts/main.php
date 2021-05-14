<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php')
?>
        <div class="wrap">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
<?php $this->endContent()?>
