<?php
use app\widgets\Alert;
use \yii\widgets\ActiveForm;
?>
 <?php if( Yii::$app->session->hasFlash('success') ): ?>
                        <div class="alert alert-success alert-dismissible" role="alert" style="text-align: center"}>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php echo Yii::$app->session->getFlash('success'); ?>
                        </div>
                    <?php endif;?>
<div class="container">
            
        <!-- Contact Email Area Start -->
        <div class="contact-email-area ptb-60">
            <div class="container">
                <div class="row">                  
                    
                    <div class="col-sm-12">
                        <h3>Обратная связь</h3>
                        <p class="text-capitalize mb-40"></p>

                        <?php $form = ActiveForm::Begin([
                            'action' => 'contact',
                             'options' => [
                            'class' => 'contact-form',
                            'method' => 'post',
                        ]]) ?>
                           
                                <div class="address-wrapper">
                                    <div class="row">    
                                        <div class="col-md-12">
                                            <div class="address-fname">                                                
                                                <?= $form->field($model, 'name')->textInput()->input('name', ['placeholder' => "Ваше имя"])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="address-email">                                               
                                                <?= $form->field($model, 'email')->textInput()->input('email', ['placeholder' => "Email"])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="address-web">                                                
                                                <?= $form->field($model, 'phone')->textInput()->input('phone', ['placeholder' => "Телефон"])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="address-subject">                                               
                                                <?= $form->field($model, 'theme')->textInput()->input('theme', ['placeholder' => "Тема"])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="address-textarea">                                              
                                                <?= $form->field($model, 'comments')->textarea(['rows'=>16, 'placeholder' => "Ваш коментарий"])->label(false); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="form-message ml-15"></p>
                                <div class="col-xs-12 footer-content mail-content">
                                    
                                    <div class="send-email">                                            
                                        <?= \yii\helpers\Html::submitButton('Отправить') ?>
                                    </div>
                                </div>
                            

                        <?php ActiveForm::end() ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Email Area End -->
        <!-- Brand Logo Start -->
        <div class="brand-area pb-60">
            <div class="container">
                           
            </div>
        </div>
        <!-- Brand Logo End -->

   