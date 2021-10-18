<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>



<div class="">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelNew, 'password_repeat')->passwordInput()->label('Пароль') ?>
    <?= $form->field($modelNew, 'password')->passwordInput()->label('Повторить') ?>    


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
