<?php
/**
 * User: TheCodeholic
 * Date: 12/12/2020
 * Time: 11:53 AM
 */
/** @var \common\models\Product $model */
?>

<div class="row ml-4 mt-5">
    <div class="col" >
        <div class="card mt-4 mb-4" > 
            <div class="row " >
                <aside class="col-sm-5 border-right">
                    <article class="gallery-wrap"> 
                    <div class="img-big-wrap">
                      <div> <a href="#"><img class="card-img-top" src="<?php echo $model->getImageUrl() ?>" ></a></div>
                    </div> <!-- slider-product.// -->
                    <div class="img-small-wrap">
                      <div class="item-gallery"> <img class="card-img-top" src="<?php echo $model->getImageUrl() ?>" alt=""> </div>
                    </div> <!-- slider-nav.// -->
                    </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-7">
                    <article class="card-body p-1">
                        <h3 class="title mb-3"><?php echo \yii\helpers\StringHelper::truncateWords($model->name, 20) ?></h3>

                        <p class="price-detail-wrap"> 
                            <span class="price h3 text-warning"> 
                                <span class="currency">KES </span><span class="num"><?php echo Yii::$app->formatter->asCurrency($model->price) ?></span>
                            </span> 
                        </p> <!-- price-detail-wrap .// -->

                        <dl class="item-property">
                          <dt>Description</dt>
                          <dd><p><?php echo $model->getShortDescription() ?></p></dd>
                        </dl>
                        <dl class="param param-feature">
                          <dt>Can#</dt>
                          <dd>Each can at </dd>
                        </dl>  <!-- item-property-hor .// -->

                        <hr>
                        <div class="row">
                            <!-- <div class="col-sm-5">
                                <dl class="param param-inline">
                                  <dt>Quantity: </dt>
                                  <dd>
                                    <div class="form-group">
                                        <input type="number"  name="name" placeholder="Number" class="form-control" style="width:100px;" autocomplete="off">
                                    </div>
                                  </dd>
                                </dl>   item-property .// 
                            </div>  col.// --> 
                            <div class="col-sm-5">
                                <dl class="param param-inline">
                                    <dt>With Can: </dt>
                                    <dd>
                                     <label class="form-check form-check-inline">
                                          <input class="form-check-input item-can" id="can" type="checkbox"  name="check[0]" value="true">
                                          <span class="form-check-label">WC</span>
                                        </label>
                                    </dd>
                                </dl>  <!-- item-property .// -->
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                        <hr>
                        <div class="card-footer text-right">
                            <a href="<?php echo \yii\helpers\Url::to(['/cart/add']) ?>" class="btn btn-primary btn-add-to-cart">
                                Add to Cart
                            </a>
                        </div>
                    </article>
                </aside>

            </div> <!-- row.// -->
        </div>
    </div>
</div> <!-- row.// -->

