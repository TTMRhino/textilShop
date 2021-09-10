<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<!-- Slider Area Start -->
<div class="slider-area slider-style-three">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="slider-wrapper theme-default">
                            <!-- Slider Background  Image Start-->
                            <div id="slider" class="nivoSlider">
                                <a href="shop.html"> <img src="img/slider/5.jpg" data-thumb="img/slider/5.jpg" alt="" title="#slider-1-caption1"/></a>
                                <a href="shop.html"><img src="img/slider/6.jpg" data-thumb="img/slider/6.jpg" alt="" title="#slider-1-caption2"/></a>
                            </div>
                            <!-- Slider Background  Image Start-->
                            <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
                                <div class="text-content-wrapper">
                                    <div class="text-content">
                                        <h4 class="title2 wow bounceInLeft text-white mb-16" data-wow-duration="2s" data-wow-delay="0s">GoodMarket74.ru</h4>
                                        <h1 class="title1 wow bounceInRight text-white mb-16" data-wow-duration="2s" data-wow-delay="1s">Оптово-розничный Интернет магазин <br>по продаже Фатина.</h1>
                                        <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="2s" data-wow-delay="2s">
                                            <a class="button slider-btn" href="shop.html">В каталог</a>                    
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div id="slider-1-caption2" class="nivo-html-caption nivo-caption">
                                <div class="text-content-wrapper">
                                    <div class="text-content slide-2">
                                        <h4 class="title2 wow bounceInLeft text-white mb-16" data-wow-duration="1s" data-wow-delay="1s">Доставка по всей территории РФ</h4>
                                        <h1 class="title1 wow flipInX text-white mb-16" data-wow-duration="1s" data-wow-delay="2s">от 100 рублей <br>по городу</h1>
                                        <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="1s" data-wow-delay="3s">
                                            <a class="button slider-btn" href="shop.html">В каталог</a>                    
                                        </div>
                                    </div>       
                                </div>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-4">
                         <!-- Single Banner Start -->
                        <div class="single-banner zoom mb-20">
                            <a href="#"><img src="img/banner/9.jpg" alt="slider-banner"></a>
                        </div>
                        <!-- Single Banner End -->
                        <!-- Single Banner Start -->
                        <div class="single-banner zoom">
                            <a href="#"><img src="img/banner/10.jpg" alt="slider-banner"></a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Area End --> 
        <!-- Product Area Start -->
        <div class="product-area pt-30">
            <div class="container">
                <div class="row">

                <?php foreach ($top_product as $product):  ?>
                    <!-- Single Product Start -->                    
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="<?= Url::to(['product/view', 'vendor' => $product->vendor]) ?>">
                                    <img class="primary-img" src="img/products/l<?= $product->getImageVendor() ?>.jpg" alt="single-product">                                    
                                </a>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content">
                                <div class="product-rating">
                                    <!-- тут был рейтинг -->
                                </div>                                
                                <h4>Топ товаров</h4>
                                <h4> <a href="<?= Url::to(['product/view', 'vendor' => $product->vendor]) ?>"><?= $product->item ?></a></h4>
                                <p>
                                    <span class="price"><?= $product->price ?>р.</span>

                                    <?php  if ($product->price < $product->old_price): ?>
                                        <del class="prev-price"><?= $product->old_price ?>р.</del>
                                    <?php endif ?>
                                </p>
                                <div class="pro-actions">
                                    <div class="actions-secondary">
                                       
                                        <a class="add-cart" href="<?= Url::to(['cart/add','id'=>$product->id]) ?>"data-id="<?= $product->id ?>" title="Add to Cart">В корзину</a>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Product Content End -->
                        </div>
                    </div>
                    <!-- Single Product End -->    
                    <?php endforeach ?>               
                   
                                       
                </div>
            </div>
        </div> 
        <!-- Product Area End --> 
        <!-- Banner Start -->
        <div class="upper-banner banner pb-60">
            <div class="container">
               <div class="row">
                   <!-- Single Banner Start -->
                   <div class="col-sm-6">
                        <div class="single-banner zoom">
                            <a href="#"><img src="img/banner/1.png" alt="slider-banner"></a>
                        </div>
                    </div>
                   <!-- Single Banner End -->
                    <!-- Single Banner Start -->
                   <div class="col-sm-6">
                        <div class="single-banner zoom">
                            <a href="#"><img src="img/banner/2.png" alt="slider-banner"></a>
                        </div>
                    </div>
                   <!-- Single Banner End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>                                
        <!-- Banner End -->
        <!-- New Products Start -->
       
        <!-- New Products End -->
        <!-- Company Policy Start -->
        <div class="company-policy pb-60">
            <div class="container">
                <div class="row">
                    <!-- Single Policy Start -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-policy">
                            <div class="icone-img">
                                <img src="img/icon/1.png" alt="">
                            </div>
                            <div class="policy-desc">
                                <h3>Доставка</h3>
                                <p>от 100 рублей по городу.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Policy End -->
                    <!-- Single Policy Start -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-policy">
                            <div class="icone-img">
                                <img src="img/icon/2.png" alt="">
                            </div>
                            <div class="policy-desc">
                                <h3>Заказы на сайте</h3>
                                <p>принимаем 24/7</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Policy End -->
                    <!-- Single Policy Start -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-policy">
                            <div class="icone-img">
                                <img src="img/icon/3.png" alt="">
                            </div>
                            <div class="policy-desc">
                                <h3>Гарантия</h3>
                                <p>На весь товар.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Policy End -->
                    <!-- Single Policy Start -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-policy">
                            <div class="icone-img">
                                <img src="img/icon/4.png" alt="">
                            </div>
                              <div class="policy-desc">
                                <h3>Акции и скидки</h3>
                                <p>Бери больше – плати меньше.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Policy End -->
                </div>
            </div>
        </div>
        <!-- Company Policy End -->   
      
        <!-- Brand Logo Start -->
    
        <!-- Brand Logo End -->