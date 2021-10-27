<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Organizations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organizations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'discount')->textInput() ?>    

    <?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(User::find()->all(), 
    'id', 'email')); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ogrn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adres_registr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adres_fact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pay_account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kor_account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bik_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
