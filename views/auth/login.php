<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
?>

<div class="wraper-login">
    <div class="login">
        <h2>Вход в личный кабинет</h2>
        
        <?php $form = ActiveForm::begin([]); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>
            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
           
            <div class="loginButton">
                <a href="<?= Url::to('registration') ?>">Регистрация</a>
               

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>

            </div>
            
        <?php ActiveForm::end(); ?>
    </div>

</div>

