<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Category;
use app\modules\admin\models\SubCategory;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Items */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model, 'maingroup_id')->dropDownList(\yii\helpers\ArrayHelper::map(Category::find()->all(), 
    'id', 'title')); ?>

   
    <?= $form->field($model, 'subgroup_id')->dropDownList(\yii\helpers\ArrayHelper::map(SubCategory::find()->all(), 
    'id', 'title')); ?>

    <?= $form->field($model, 'item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'pur_price')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'old_price')->textInput() ?>

    <?= $form->field($model, 'remains')->textInput() ?>

    <?= $form->field($model, 'top_product')->textInput() ?>
    <?= $form->field($model, 'top_product')->dropDownList([1 =>'Да', 0=>'Нет']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
