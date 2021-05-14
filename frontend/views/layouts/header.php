<?php
use yii\helpers\Url;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Nav;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

$cartItemCount = $this->params['cartItemCount'];

?>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-expand-lg navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        [
            'label' => 'Cart <span id="cart-quantity" class="badge badge-danger">' . $cartItemCount . '</span>',
            'url' => ['/cart/index'],
            'encode' => false
        ],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else { 
        $menuItems [] = ['label' => 'Order History', 'url' => ['/cart/history'] ];
        $menuItems[] = [
            'label' => Yii::$app->user->identity->username,
//            'dropDownOptions' => [
//                'class' => 'dropdown-menu-right'
//            ],
            'items' => [
                [
                    'label' => 'Profile',
                    'url' => ['/profile/index'],
                ],
                [
                    'label' => 'Logout',
                    'url' => ['/site/logout'],
                    'linkOptions' => [
                        'data-method' => 'post'
                    ],
                ]
            ]
        ];
    }
    if(\Yii::$app->user->can('Cashier')) {
        $menuItems [] = ['label' => 'Manage Orders', 'url' => ['/product/orderitems'] ];
        $menuItems [] = ['label' => 'Order Details', 'url' => ['/product/details'] ];
        $menuItems [] = ['label' => 'POS', 'url' => ['/cashier/index'] ];
        $menuItems [] = ['label' => 'Contact', 'url' => ['/site/contact'] ];
        $menuItems[] = ['label' => 'Logout ('.Yii::$app->user->identity->username.')',
            'url'=>['site/logout'],
            'linkOptions'=>[
                'data-method'=>'post'
            ]
        ];
        }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto '],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>


