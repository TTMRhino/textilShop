<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\captcha\Captcha;

$this->title = 'Регистрация';
?>


<div class="wraper-login">
    <div class="login">
        <h2>Регистрация личного кабинета</h2>
        
        <?php $form = ActiveForm::begin([]); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>
            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

           

            <?=
$form->field($model, 'verifyCode')->widget(Captcha::className(), [
    //'captchaAction' => 'site/captcha', // uncomment and change if your not in the default controller or a module
    'template' => '
        <div class="row">
            <div class="col-lg-2 col-3">
                {image}
            </div>
            <div class="col-lg-5  col-3 ml-3">
                {input}
            </div>
        </div>',
])->hint('Hint: кликнете на цифры что бы обновить')
?>
            <div class="loginButton">
                <div class="form-group">                    
                        <?= Html::submitButton('Зарегестрировать', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>                   
                </div>

            </div>
            
        <?php ActiveForm::end(); ?>
    </div>

</div>