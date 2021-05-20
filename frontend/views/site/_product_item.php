<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;
use yii\helpers\StringHelper;
use common\models\Cans;
use common\models\Product;

/* @var $this yii\web\View */

$this->title = 'Product';/*
$listings = ProductImages::find()->joinWith('product')->all();*/
$products = Product::find()->where(['status'=>1])->all();
$can = Cans::find()->where(['canStatus'=>1])->all();
?>
  <style>
.checked {
  color: orange;
}
</style>     
    <!--====== SLIDER PART START ======-->
    
    <section id="slider-part-1" class="slider-1">
        <div class="slider-active">
            <div class="single-slider bg_cover d-flex align-items-center" style="background-image: url(img/bg-1.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="slider-content pt-30 text-center">
                                <h2 data-animation="fadeInUp" data-delay="1s">Always want safe and good water for healthy life</h2>
                                <p data-animation="fadeInUp" data-delay="1.5s">Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit <br> amet tincidunt metus. Nunc eu risus suscipit massa dapibu.</p>
                                <a data-animation="fadeInUp" data-delay="2s" href="#">Order Now</a>
                            </div> <!-- slider content -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- single slider -->
            
            <div class="single-slider bg_cover d-flex align-items-center" style="background-image: url(img/bg-3.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="slider-content pt-30 text-center">
                                <h2 data-animation="fadeInUp" data-delay="1s">Always want safe and good water for healthy life</h2>
                                <p data-animation="fadeInUp" data-delay="1.5s">Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit <br> amet tincidunt metus. Nunc eu risus suscipit massa dapibu.</p>
                                <a data-animation="fadeInUp" data-delay="2s" href="#">Buy Now</a>
                            </div> <!-- slider content -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- single slider -->
    </section>
    
    <!--====== SLIDER PART ENDS ======-->

    <!--====== PRODUCTS PART START ======-->
    <section id="products-part" class="pt-70 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-15">
                        <h2>Our Products</h2>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <p>Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet tincidunt metus. Nunc eu risus  suscipit massa dapibus blandit. Vivamus ac commodo eros.</p>
                    </div> <!-- section-title -->
                </div>
            </div>
            
            <div class="row">   
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step col-xs-4"> 
                            <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                            <p><small>Water</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-4"> 
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p><small>Cans</small></p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-1">
                    <div class="panel-heading">
                         <h3 class="panel-title">Water</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach ($products as $product) {?>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="singel-products mt-30">
                                        <div class="products-image">
                                            <img src="<?php echo $product->getImageUrl() ?>" alt="Products">
                                            <div class="new-sele">
                                                <a href="#">New</a>
                                            </div>
                                        </div>
                                        <div class="products-contant">
                                            <h6 class="products-title"><a href="#"><?=$product->name  ?></a></h6>
                                            <div class="price-rating d-flex justify-content">
                                                <div class="price">
                                                    <span class="regular-price mr-3">KSh <?=$product->price  ?></span>
                                                </div>
                                                <span><p>Quantity:</p></span>
                                                <span><input type="number" id="quantity_<?= $product->id?>" min="1" name="name" placeholder="Qty" class="form-control" style="width:80px;" autocomplete="off"> </span> <!-- item-property .// -->
                                                    
                                            </div>
                                            
                                            <p class="text"><?=$product->description  ?></p>
                                            <div class="products-cart">
                                                <span><a class="cart-add order" baseUrl="<?= Yii::$app->request->baseUrl?>" id="<?= $product->id?>"><i class="fa fa-shopping-cart"></i>Add to cart</a>  </span>                           
                                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-primary setup-content" id="step-2">
                    <div class="panel-heading">
                         <h3 class="panel-title">Cans</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach ($can as $cann) {?>
                                <div class="col-lg-3 col-md-4 col-sm-6" style="width: 500px;">
                                    <div class="singel-products mt-30">
                                        <div class="products-image">
                                            <img src="<?php echo $product->getImageUrl() ?>" alt="Products">
                                            <div class="new-sele">
                                                <a href="#">New</a>
                                            </div>
                                        </div>
                                        <div class="products-contant">
                                            <h6 class="products-title"><a href="#"><?=$cann->type  ?></a></h6>
                                            <div class="price-rating d-flex justify-content">
                                                <div class="price">
                                                    <span class="regular-price mr-3">KSh <?=$cann->amount  ?></span>
                                                </div>
                                            </div>
                                            <div class="products-cart">
                                                    <span><a class="cart-add order" baseUrl="<?= Yii::$app->request->baseUrl?>" id="<?= $cann->canId?>"><i class="fa fa-shopping-cart"></i>Add to cart</a>  </span>                           
                                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    
                    </div>
                </div>
            </div>
            
        </div>
    </section>

   
    <!--====== PRODUCTS PART ENDS ======-->
   
    <!--====== TRUSTED CLIENT PART START ======-->
    
    <section id="trusted-clients-part" class="bg_cover pt-155 pb-185" style="background-image: url(img/trusted-clients/bg-1.jpg)">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-3 col-md-4">
                    <div class="trusted-clients-logo text-center pt-30">
                        <img src="<?= Yii::$app->request->baseUrl ?>/img/trusted-clients/tc-logo.png?>" alt="Logo">
                        <h5>Imperial</h5>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <h1>5.0</h1>
                    </div>
                </div>
                <div class="col-lg-5 col-md-8">
                    <div class="trusted-slied owl-carousel pt-30">
                        <div class="trusted-clients-discription  mb-40">
                            <h1>Trusted From Our Clients</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing the industry's standard dummy text ever since an unknown printer took a galley.</p>
                            <a class="badge badge-pill btn-primary px-3 py-3" href="#">Place Your Order</a>
                        </div>
                        <div class="trusted-clients-discription  mb-40">
                            <h1>Trusted From Our Clients</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing the industry's standard dummy text ever since an unknown printer took a galley.</p>
                            <a class="badge badge-pill btn-primary px-3 py-3" href="#">Place Your Order</a>
                        </div>
                        <div class="trusted-clients-discription  mb-40">
                            <h1>Trusted From Our Clients</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing the industry's standard dummy text ever since an unknown printer took a galley.</p>
                            <a class="badge badge-pill btn-primary px-3 py-3" href="#">Place Your Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== TRUSTED CLIENT PART ENDS ======-->
   
    <!--====== SERVICES PART START ======-->
    
    <section id="services-part" class="services-part-3 pt-70 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h2>Why Choose Us ?</h2>

                        <p>Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet tincidunt metus. Nunc eu risus  suscipit massa dapibus blandit. Vivamus ac commodo eros.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="singel-services mt-45 pb-50">
                        <div class="services-icon">
                            <img src="<?= Yii::$app->request->baseUrl ?>/img/choose-us/icon-1.png?>" alt="Icon">
                        </div>
                        <div class="services-cont pt-25">
                            <h4>Aliquam congue fermentum</h4>
                            <p>Nam ut pharetra enim, in tincidunt orci. Ut sed neque dolor. Nullam auctor placerat ipsum. In finibus tortor pulvinar pulvinar laoreet. Quisque id nibh non lectus dictum dapibus quis ac urna.</p>
                        </div>
                    </div>
                    
                    <div class="singel-services">
                        <div class="services-icon">
                            <img src="<?= Yii::$app->request->baseUrl ?>/img/choose-us/icon-3.png?>" alt="Icon">
                        </div>
                        <div class="services-cont pt-25">
                            <h4>Aliquam congue fermentum</h4>
                            <p>Nam ut pharetra enim, in tincidunt orci. Ut sed neque dolor. Nullam auctor placerat ipsum. In finibus tortor pulvinar pulvinar laoreet. Quisque id nibh non lectus dictum dapibus quis ac urna.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="singel-services mt-50 text-center">
                        <img src="<?= Yii::$app->request->baseUrl ?>/img/choose-us/services-2.jpg?>" alt="Image">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="singel-services right mt-45 text-right pb-50">
                        <div class="services-icon">
                            <img src="<?= Yii::$app->request->baseUrl ?>/img/choose-us/icon-2.png?>" alt="Icon">
                        </div>
                        <div class="services-cont pt-25">
                            <h4>Aliquam congue fermentum</h4>
                            <p>Nam ut pharetra enim, in tincidunt orci. Ut sed neque dolor. Nullam auctor placerat ipsum. In finibus tortor pulvinar pulvinar laoreet. Quisque id nibh non lectus dictum dapibus quis ac urna.</p>
                        </div>
                    </div>
                    
                    <div class="singel-services right text-right ">
                        <div class="services-icon">
                            <img src="<?= Yii::$app->request->baseUrl ?>/img/choose-us/icon-4.png?>" alt="Icon">
                        </div>
                        <div class="services-cont pt-25">
                            <h4>Aliquam congue fermentum</h4>
                            <p>Nam ut pharetra enim, in tincidunt orci. Ut sed neque dolor. Nullam auctor placerat ipsum. In finibus tortor pulvinar pulvinar laoreet. Quisque id nibh non lectus dictum dapibus quis ac urna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== SERVICES PART ENDS ======-->

   
    <!--====== DELIVERY PART START ======-->
    
    <section id="delivery-part" class="bg_cover" data-overlay="8" style="background-image: url(img/bg-2.jpg)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 offset-xl-1">
                    <div class="delivery-text text-center pb-30">
                        <h2>Water Delivery 20 k.m.  Free Service</h2>
                        <p>Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet tincidunt metus. Nunc eu risus suscipit massa dapibu.</p>
                        <a href="#">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="delivery-image d-none d-lg-flex align-items-end">
            <img src="<?= Yii::$app->request->baseUrl ?>/img/delivery-van.png?>" alt="Iamge">
        </div>
    </section>
    
    <!--====== DELIVERY PART ENDS ======-->
   
    <!--====== FOOTER PART START ======-->
    
    <footer id="footer-part" class="pt-65">
        <div class="container ">           
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-about pt-30">
                            <a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/img/logo-footer.png?>" alt="logo"></a>
                            <p class="mt-2">Donec vel ligula ornare, finibus ex at, vive risus. Aenean velit ex, finibus elementum eu, dignissim varius augue. </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-title pt-30">
                            <h5>Information</h5>
                        </div>
                        <div class="footer-info">
                            <a href="<?= Url::to(['/site/contact'])?>">Contact Us</a><br>
                            <a href="#">Privacy Policy</a><br>
                            <a href="#">Terms & Conditions</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-title pt-30">
                            <h5>Our Services</h5>
                        </div>
                        <div class="footer-info">
                            <a href="<?= Url::to(['/profile/index'])?>">My Account</a><br>
                            <a href="<?= Url::to(['/cart/history'])?>">Order History</a><br>
                            <a href="<?= Url::to(['/cart/index'])?>">Orders</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-title pt-30">
                            <h5>Get In Touch</h5>
                        </div>
                        <div class="footer-address">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="col-md-10">
                                    <h5>Imperial Water</h5>
                                    <p>Kimbo-Ruiru <br> Kiambu.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 ">
                                    <i class="fa fa-volume-control-phone"></i>
                                </div>
                                <div class="col-md-10">
                                    <p>+25473654789</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 ">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="col-md-10">
                                    <p>imperialwater@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>        
    </footer>
    
    <!--====== FOOTER PART ENDS ======-->
   
    <!--====== BACK TO TOP PART START ======-->
    
    <a href="#" class="back-to-top">
        <img src="<?= Yii::$app->request->baseUrl ?>/img/back-to-top.png?>" alt="Icon">
    </a>
    
    <!--====== BACK TO TOP PART ENDS ======-->
   
