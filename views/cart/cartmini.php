<?php

use yii\helpers\Url;
?>
<li><a href="<?= Url::to(['cart/index']) ?>"><i class="fa fa-shopping-basket"></i><span class="cart-counter"><?= $_SESSION['cart.qty'] ? $_SESSION['cart.qty'] : 0 ?></span></a>
    <ul class="ht-dropdown main-cart-box">
        <li>

            <?php if (isset($_SESSION['cart'])) : ?>
                <?php foreach ($_SESSION['cart'] as $cartItem) : ?>
                    <!-- Cart Box Start -->
                    <div class="single-cart-box">
                        <div class="cart-img">
                            <a href="#"><img src="/img/products/l<?= str_replace('/','',$cartItem['vendor']) ?>.jpg" alt="cart-image"></a>
                        </div>
                        <div class="cart-content">
                            <h6><a href="<?= Url::to(['cart/index']) ?>"><?= $cartItem['title'] ?></a></h6>
                            <span><?= $cartItem['qty'] ?> × <?= $cartItem['price'] ?></span>
                        </div>

                        <a class="del-icone delete"  href="#" 
                            data-id="<?= $cartItem['id'] ?>">
                            <i class="fa fa-window-close-o"></i>
                        </a>

                        

                    </div>
                    <!-- Cart Box End -->

                <?php endforeach ?>
            <?php endif ?>

            <!-- Cart Footer Inner Start -->
            <div class="cart-footer fix">
                <h5>total :<span class="f-right"><?= $_SESSION['cart.sum'] ?>р.</span></h5>
                <div class="cart-actions">
                    <a class="checkout" href="<?= Url::to(['cart/index']) ?>">Checkout</a>
                </div>
            </div>
            <!-- Cart Footer Inner End -->

        </li>
    </ul>
</li>