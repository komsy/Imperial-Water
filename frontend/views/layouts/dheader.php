<?php
use yii\helpers\Url;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Nav;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

?>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-dark bg-dark sticky-top',
        ],
    ]);
    $menuItems = [];
     if (Yii::$app->user->isGuest) {

        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
         if(\Yii::$app->user->can('Cashier')) {
        $menuItems [] = ['label' => 'Manage Orders', 'url' => ['/cashier/orderitems'] ];
        $menuItems [] = ['label' => 'Order Details', 'url' => ['/cashier/details'] ];
        $menuItems [] = ['label' => 'POS', 'url' => ['/cashier/index'] ];
        $menuItems [] = ['label' => 'Contact', 'url' => ['/site/contact'] ];
        $menuItems[] = ['label' => 'Logout ('.Yii::$app->user->identity->username.')',
            'url'=>['site/logout'],
            'linkOptions'=>[
                'data-method'=>'post'
            ]
        ];
        }
    }
  
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto '],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>


