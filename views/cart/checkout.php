<?php

use app\widgets\Alert;
use \yii\widgets\ActiveForm;
?>
<div class="checkout-area pt-30  pb-60">
            <div class="container">
            <?= Alert::widget() ?>
            
                <div class="row">
                    
                    <?php if(!empty($session['cart'])): ?>
                    <div class="col-lg-6 col-md-6">
                        <?php $form = ActiveForm::begin() ?>
                            <?= $form->field($customer, 'name') ?>
                            <?= $form->field($customer, 'phone') ?>
                            <?= $form->field($customer, 'mailindex') ?>
                            <?= $form->field($customer, 'city') ?>
                            <?= $form->field($customer, 'adress') ?>
                            <?= $form->field($customer, 'comments')->textarea(['rows'=>5]) ?>
                            
                    </div>
                    
                            <div class="col-lg-6 col-md-6">
                                    <div class="your-order">
                                        <h3>Ваш заказ</h3>
                                        <div class="your-order-table table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="product-name">Товар</th>
                                                        <th class="product-total">Всего</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <?php foreach($session['cart'] as $item): ?>

                                                    <tr class="cart_item">
                                                        <td class="product-name">
                                                            <?= $item['title'] ?> <strong class="product-quantity"> × <?= $item['qty'] ?> шт.</strong>
                                                        </td>
                                                        <td class="product-total">
                                                            <span class="amount"><?= $item['price'] * $item['qty'] ?>р.</span>
                                                        </td>
                                                    </tr>

                                                    <?php endforeach ?>
                                                    
                                                </tbody>
                                                <tfoot>                                           
                                                    <tr class="order-total">
                                                        <th>Итого по заказу</th>
                                                        <td><strong><span class="amount"><?= $session['cart.sum'] ?>р.</span></strong>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="payment-method">
                                            <div class="payment-accordion">
                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                            <h4 class="panel-title">
                                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Оплата:
                                                            </a>
                                                            </h4>
                                                        </div>
                                                      <!--  <div id="collapseOne" class="panel-collapse collapse  in show" role="tabpanel" aria-labelledby="headingOne">
                                                            <div class="panel-body">
                                                                <?= $form->field($customer, 'name')->radioList([1 => 'Оплата наличными при получении', 0 => 'Банковской картой']) ?>                                                               
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                    
                                                   
                                                </div>
                                                <div class="order-button-payment">                                            
                                                    <?= \yii\helpers\Html::submitButton('Заказать') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                        <?php ActiveForm::end() ?>
                        <?php endif ?>
                </div>
            </div>
</div>