<?php
use yii\widgets\ActiveForm;
?>




<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>

<div class="row">
    <div class="col-sm-12">
        <?php if( Yii::$app->session->hasFlash('success_uploaded') ): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success_uploaded'); ?>
            </div>
        <?php elseif(Yii::$app->session->hasFlash('error_uploaded')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('error_uploaded'); ?>
            </div>

        <?php endif;?>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <?php if(!empty($message)):?>
            <?php foreach($message as $mesg): ?>
                <?= $mesg ?>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>


