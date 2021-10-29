<?php
use yii\helpers\Url;
?>

<div class="cart-main-area pb-80 pb-sm-50">
            <div class="container">
               <h2 class="text-capitalize sub-heading">Корзина</h2>
                <div class="row" >
                <div class="col-md-12">
                <h1>Заказ офрмлен</h1>

                    <a class="btn btn-primary" href="<?= Url::to(['cart/get-bill']) ?>" role="button">взять счет </a>
                </div>
                </div>    
            </div>
</div>
