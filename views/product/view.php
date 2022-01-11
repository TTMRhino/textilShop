<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
 <!-- Product Thumbnail Start -->
 <div class="main-product-thumbnail pb-60">
            <div class="container">
                <div class="row">
                    <!-- Main Thumbnail Image Start -->
                    <div class="col-lg-5">
                        <!-- Thumbnail Large Image start -->
                        <div class="tab-content">
                            <div id="thumb1" class="tab-pane active">
                                <a data-fancybox="images" href="/img/products/<?=  $item->vendor ?>.jpg"><img src="/img/products/<?=  $item->vendor ?>.jpg" alt="product-view"></a>
                            </div>
                           <!-- <div id="thumb2" class="tab-pane">
                                <a data-fancybox="images" href="/img/products/2.jpg"><img src="/img/products/2.jpg" alt="product-view"></a>
                            </div>
                            <div id="thumb3" class="tab-pane">
                                <a data-fancybox="images" href="/img/products/3.jpg"><img src="/img/products/3.jpg" alt="product-view"></a>
                            </div>
                            <div id="thumb4" class="tab-pane">
                                <a data-fancybox="images" href="/img/products/4.jpg"><img src="/img/products/4.jpg" alt="product-view"></a>
                            </div>-->
                        </div> 
                        <!-- Thumbnail Large Image End -->

                        <!-- Thumbnail Image End -->
                       <!-- <div class="product-thumbnail">
                            <div class="thumb-menu nav">
                                    <a class="active" data-toggle="tab" href="#thumb1"> <img src="/img/products/1.jpg" alt="product-thumbnail"></a>
                                    <a data-toggle="tab" href="#thumb2"> <img src="/img/products/2.jpg" alt="product-thumbnail"></a>
                                    <a data-toggle="tab" href="#thumb3"> <img src="/img/products/3.jpg" alt="product-thumbnail"></a>
                                    <a data-toggle="tab" href="#thumb4"> <img src="/img/products/4.jpg" alt="product-thumbnail"></a>
                            </div>
                        </div>-->
                        <!-- Thumbnail image end -->
                    </div>
                    <!-- Main Thumbnail Image End -->
                    <!-- Thumbnail Description Start -->
                    <div class="col-lg-7">
                        <div class="thubnail-desc fix">
                            <h3 class="product-header"><?= $item->item ?></h3>
                            

                            <p class="">Группа: <?= is_null($item->category) ? '' : $item->category->title?></p>
                            
                            <p class="">Подгруппа: <?php if(empty($item->subCategory->title)){
                                 echo 'Пусто';
                            }else{
                                 echo $item->subCategory->title;
                            }  ?>
                            
                            </p>

                            <div class="rating-summary fix mtb-10">
                                <div class="rating f-left">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                
                            </div>
                            <div class="pro-price mb-10">
                                <p><span class="price"><?= $item->price ?>р.</span><del class="prev-price"><?= $item->old_price ?></del></p>
                            </div>
                            <div class="pro-ref mb-15">
                                <p><span class="in-stock">На складе</span><span class="sku">50шт.</span></p>
                            </div>
                            
                            <div class="box-quantity">
                                <form action="#">
                                  
                                    <a class="add-cart" href="<?= Url::to(['cart/add','id'=>$item->id]) ?>">в корзину</a>
                                </form>
                            </div>
                            
                            <p class="ptb-20"><?= $item->description ?></p>
                        </div>
                    </div>
                    <!-- Thumbnail Description End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Product Thumbnail End -->