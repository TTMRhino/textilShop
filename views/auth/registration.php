<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\captcha\Captcha;

$this->title = 'Регистрация';
?>

<!-- Если регисрация успешна -->
<?php if( Yii::$app->session->hasFlash('success') ): ?>
            <div class="alert alert-success alert-dismissible" style="text-align: center;" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" >&times;</span>
            </button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>            
        <?php endif;?>

<div class="wraper-login">
    <div class="login">
        <h2>Регистрация личного кабинета</h2>
        
        <?php $form = ActiveForm::begin(); ?>
        
            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>
            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
            <?= $form->field($model, 'password_repeat')->passwordInput()->label('Пароль  повторно') ?>
            
            
            <?= $form->field($model, 'email')->input('email')->label('email') ?>
            

           

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
                ])
            ?>
            <div class="loginButton">
                <div class="form-group">                    
                        <?= Html::submitButton('Зарегестрировать', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>                   
                </div>

            </div>
            
        <?php ActiveForm::end(); ?>
    </div>

</div>