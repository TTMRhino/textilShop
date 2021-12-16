<?php

use yii\helpers\Url;

$this->title = 'Статистка';
$this->params['breadcrumbs'][] = [
    'template' => "<li> > {link}</li>\n",
    'label' => $this->title,
];
?>

<div class="container-fluid">
    <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $orders ?></h3>

                    <p>Заказов</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="<?=  Url::to('/admin/customers/index') ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $items ?><sup style="font-size: 20px"></sup></h3>

                    <p>Товаров</p>
                </div>
                <div class="icon">
                <i class="fas fa-tools"></i>
                </div>
                <a href="<?= Url::to('/admin/items/index') ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>
            
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= $category ?></h3>

                    <p>Групп</p>
                </div>
                <div class="icon">
                <i class="fas fa-object-group"></i>
                </div>
                <a href="<?= Url::to('/admin/category/index') ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h3><?= $subCategory ?></h3>

                    <p>Под групп</p>
                </div>
                <div class="icon">
                <i class="far fa-object-group"></i>
                </div>
                <a href="<?= Url::to('/admin/sub-category/index') ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>
               <!-- ./col -->

               <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $customers ?></h3>

                        <p>Клиенты</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= Url::to('/admin/customers/index') ?>" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>                
            </div>

            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3><?= $organizations ?></h3>

                    <p>Организации</p>
                </div>
                <div class="icon">
                <i class="fa fa-industry" aria-hidden="true"></i>

                </div>
                <a href="<?= Url::to('/admin/organizations/index') ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>
        </div>

</div>
