<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<!-- Shop Page Start -->
<div class="main-shop-page pb-60">
            <div class="container">
                <!-- Row End -->
                <div class="row">
                    <!-- Sidebar Shopping Option Start -->
                    <div class="col-lg-3  order-2">
                        <div class="sidebar white-bg">

                            <?= \app\components\CategoryWidget::widget([
                                'tpl'=>'select',
                                'ul_class'=>'middle-menu-list menuSideBar'
                            ]); ?>
                          
                          
                          
                         
                           
                            <!-- Single Banner Start -->
                            <div class="single-sidebar single-banner zoom pt-20">
                                <a href="#" class="hidden-sm"><img src="img/banner/8.jpg" alt="slider-banner"></a>
                                <a href="#" class="visible-sm"><img src="img/banner/6.jpg" alt="slider-banner"></a>
                            </div>
                            <!-- Single Banner End -->
                        </div>
                    </div>
                    <!-- Sidebar Shopping Option End -->                    
                    <!-- Product Categorie List Start -->
                    <div class="col-lg-9 order-lg-2">
                        <!-- Grid & List View Start -->
                        <div class="grid-list-top border-default universal-padding fix mb-30">
                            <div class="grid-list-view f-left">
                                <ul class="list-inline nav">
                                    <li><a data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                    <li><a  class="active" data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
                                    <li><span class="grid-item-list"> Items 1-12 of 13</span></li>
                                </ul>
                                <h3>Поиск: "<?= Html::encode($q) ?>"</h3>
                            </div>
                            <!-- Toolbar Short Area Start -->
                           
                            <!-- Toolbar Short Area End -->
                        </div>


                    <?php if (!empty($items)): ?>           
                        <!-- Grid & List View End -->
                        <div class="main-categorie">
                            <!-- Grid & List Main Area End -->
                            <div class="tab-content fix">
                                <div id="grid-view" class="tab-pane ">

                                    <div class="row">
                                    
                                        <?php  foreach($items as $item):?>
                                            <!-- Single Product Start -->                    
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="single-product">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="<?= Url::to(['product/view', 'vendor' => $item->vendor]) ?>">
                                                            <img class="primary-img" src="/img/products/<?=  $item->vendor ?>.jpg" alt="<?=$item->item ?>">
                                                            <img class="secondary-img" src="/img/products/<?=  $item->vendor ?>.jpg" alt="<?=$item->item ?>">
                                                        </a>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <div class="product-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>                                
                                                        <h4><a href="<?= Url::to(['product/view', 'vendor' => $item->vendor]) ?>"><?= $item->item ?></a></h4>
                                                        <p><span class="price"><?= $item->price ?></span><del class="prev-price"><?= $item->old_price ?></del></p>
                                                        <div class="pro-actions">
                                                            <div class="actions-secondary">
                                                                <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                <a class="add-cart" 
                                                                href="<?= Url::to(['cart/add','id'=>$item->id]) ?>"
                                                                data-id="<?= $item->id ?>" 
                                                                data-toggle="tooltip" 
                                                                title="Add to Cart">Add To Cart</a>
                                                                
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



                                <!-- LIST VIEW  -->
                                <!-- #grid view End -->
                               

                                <div id="list-view" class="tab-pane active">
                                    
                                    <?php foreach($items as $item): ?>
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="<?= Url::to(['product/view', 'vendor' => $item->vendor]) ?>">
                                                    <img class="primary-img" src="/img/products/<?=  $item->vendor ?>.jpg" alt="<?= $item->item ?>">
                                                    <img class="secondary-img" src="/img/products/<?=  $item->vendor ?>.jpg" alt="">
                                                </a>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>                                
                                                <h4><a href="<?= Url::to(['product/view', 'vendor' => $item->vendor]) ?>"><?= $item->item ?></a></h4>
                                                <p><span class="price"><?= $item->price ?>р.</span><del class="prev-price"><?= $item->old_price ?>р.</del></p>
                                                <p><?= $item->description ?></p>
                                                <div class="pro-actions">
                                                    <div class="actions-secondary">
                                                        <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                        <a class="add-cart" href="<?= Url::to(['cart/add','id'=>$item->id]) ?>"
                                                            data-id="<?= $item->id ?>"  
                                                            data-toggle="tooltip" 
                                                            title="Add to Cart">Add To Cart</a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                    <?php endforeach ?>
                                  

                                  


                                </div>
                                <!-- #list view End -->
                                
                            </div>
                            <!-- Grid & List Main Area End -->
                        </div>

                        <!--Breadcrumb and Page Show Start -->
                        <div class="pagination-box fix">

                                        
                                        
                            <ul class="blog-pagination ">
                                <!-- <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>-->
                                <?= \yii\widgets\LinkPager::widget([
                                            'pagination'=> $pages,
                                            
                                        ]); ?>
                            </ul>

                            <div class="toolbar-sorter-footer">
                                <label>show</label>
                                <select class="sorter" name="sorter">
                                    <option value="Position" selected="selected">12</option>
                                    <option value="Product Name">15</option>
                                    <option value="Price">30</option>
                                </select>
                                <span>per page</span>
                            </div>
                        </div>
                        <!--Breadcrumb and Page Show End -->
                    </div>
                    <!-- product Categorie List End -->
                </div>
                <?php else: ?>

<h2>Ничего не найдено!</h2>

<?php endif ?> 
                <!-- Row End -->
            </div>
            <!-- Container End -->
</div>

