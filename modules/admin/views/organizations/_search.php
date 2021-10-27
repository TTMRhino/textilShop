<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\OrganizationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organizations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'inn') ?>

    <?= $form->field($model, 'ogrn') ?>

    <?php // echo $form->field($model, 'kpp') ?>

    <?php // echo $form->field($model, 'adres_registr') ?>

    <?php // echo $form->field($model, 'adres_fact') ?>

    <?php // echo $form->field($model, 'pay_account') ?>

    <?php // echo $form->field($model, 'kor_account') ?>

    <?php // echo $form->field($model, 'bik_bank') ?>

    <?php // echo $form->field($model, 'bank_name') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
