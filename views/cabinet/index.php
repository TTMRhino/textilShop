<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>


        <div class="container">
       
        
                <div class="row">
                        <div class="col-lg-12 ">
                                <h1 style="text-align:center;">Личный кабенет</h1>
                        </div>
                </div>

                <div class="row">                        
                        <div class="col-lg-12 ">
                                <ul class="cabinet-list"> 

                                        <li><span>Организация:</span> <?= $organization->name ?> </li>
                                        <li><span>Инн:</span> <?= $organization->inn ?></s></li>
                                        <li><span>ОГРН:</span> <?= $organization->ogrn ?></li>
                                        <li><span>КПП:</span> <?= $organization->kpp ?></li>
                                        <li><span>Адрес регистрации:</span> <?= $organization->adres_registr ?></li>
                                        <li><span>Адрес фактически:</span> <?= $organization->adres_fact ?></li>
                                        <li><span>Расчетный сче:</span> <?= $organization->pay_account ?></li>
                                        <li><span>Корр.счет:</span> <?= $organization->kor_account ?></li>
                                        <li><span>БИК Банка:</span> <?= $organization->bik_bank ?></li>
                                        <li><span>Банк:</span> <?= $organization->bank_name ?></li>                                      
                                
                                </ul>
                        </div>

                        <div class="col-lg-12" style="text-align: center;">

                                                            
                                <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#cabinetModal">
                                Изменить данные
                                </a>

                                <div class="modal fade" id="cabinetModal" tabindex="-1" role="dialog" aria-labelledby="cabinetModal" aria-hidden="true">
                                        <div class="modal-dialog">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Изменение данных </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <!-- Тело модального окна -->                                                                
                                                                <?php $form = ActiveForm::begin(); ?>
                                                                        <div class="container">        
                                                                                <div class="row">
                                                                                        <div class="col-lg-6 ">
                                                                                                <?= $form->field($organization, 'name')->textInput()->label('Огранизация') ?>
                                                                                                <?= $form->field($organization, 'inn')->textInput()->label('Инн') ?>
                                                                                                <?= $form->field($organization, 'ogrn')->textInput()->label('ОГРН') ?>
                                                                                                <?= $form->field($organization, 'kpp')->textInput()->label('КПП') ?>
                                                                                                <?= $form->field($organization, 'adres_registr')->textInput()->label('Адрес регистрации') ?>
                                                                                                <?= $form->field($organization, 'adres_fact')->textInput()->label('Фактический адрес') ?>
                                                                                        </div>
                                                                                        <div class="col-lg-6 ">
                                                                                                <?= $form->field($organization, 'adres_registr')->textInput()->label('Адрес регистрации') ?>
                                                                                                <?= $form->field($organization, 'pay_account')->textInput()->label('Расчетный счет') ?>
                                                                                                <?= $form->field($organization, 'kor_account')->textInput()->label('Корр.счет') ?>
                                                                                                <?= $form->field($organization, 'bik_bank')->textInput()->label('БИК Банка') ?>
                                                                                                <?= $form->field($organization, 'bank_name')->textInput()->label('Банк') ?>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        
                                                                        <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                                                                
                                                                                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                                                        </div>
                                                                        
                                                                <?php ActiveForm::end(); ?>
                                                        </div>
                                                        
                                                </div>
                                        </div>
                                </div>


                        </div>




                        <div class="col-lg-12" style="text-align: center;">
                                <h1 class="discount">Скидка <?= $organization->discount ?>% </h1>
                        </div>
                </div>
        </div>

