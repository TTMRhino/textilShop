<?php
use yii\helpers\Html;
use yii\helpers\Url;
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
                                                                <h3>Modal Body</h3>
                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                                                <button type="button" class="btn btn-primary">Сохранить</button>
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

