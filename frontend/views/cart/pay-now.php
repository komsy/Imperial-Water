<?php
/**
 * User: Komsy
 * Date: 11/07/2021
 * Time: 3:25 PM
 */

/** @var \common\models\Order $order */

use yii\helpers\Url;
use yii\bootstrap4\Modal;

$orderAddress = $order->orderAddress
?>
<div class="container">
<h3>Order #<?php echo $order->id ?> summary: </h3>
<hr>
<div class="row">
    <div class="col">
        <h5>Account information</h5>
        <table class="table">
            <tr>
                <th>Firstname</th>
                <td><?php echo $order->firstname ?></td>
            </tr>
            <tr>
                <th>Lastname</th>
                <td><?php echo $order->lastname ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $order->email ?></td>
            </tr>
        </table>
        <h5>Address information</h5>
        <table class="table">
            <tr>
                <th>Address</th>
                <td><?php echo $orderAddress->address ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $orderAddress->city ?></td>
            </tr>
            <tr>
                <th>State</th>
                <td><?php echo $orderAddress->state ?></td>
            </tr>
            <tr>
                <th>Country</th>
                <td><?php echo $orderAddress->country ?></td>
            </tr>
            <tr>
                <th>ZipCode</th>
                <td><?php echo $orderAddress->zipcode ?></td>
            </tr>
        </table>
    </div>
    <div class="col">
        <h5>Products</h5>
        <table class="table table-sm">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order->orderItem as $item): ?>
                <tr>
                    <td>
                        <img src="<?php echo $item->product->getImageUrl() ?>"
                            style="width: 50px;">
                    </td>
                    <td><?php echo $item->product_name ?></td>
                    <td><?php echo $item->quantity ?></td>
                    <td><?php echo ($item->quantity * $item->unit_price) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <hr>
        <table class="table">
            <tr>
                <th>Total Items</th>
                <td><?php echo $order->getItemsQuantity() ?></td>
            </tr>
            <tr>
                <th>Total Price</th>
                <td><?php echo ($order->total_price) ?></td>
            </tr>
        </table>
         <div class="col">
        <a href="#" class="btn btn-block btn-info btn-small mt-5 deposit ">Pay With Mpesa </a>

        <a href="<?= Url::to(['site/index'])?>" class="btn btn-block btn-outline-dark btn-small mt-5">Pay on Delivery </a>
    </div>
    </div>

</div>
</div>

<?php
    Modal::begin([
        'title'=>'<h4> Mpesa Payment Method</h4>',
        'id'=>'deposit',
        'size'=>'modal-md'
        ]);
    echo "<div id='depositContent'></div>";
    Modal::end();
?>