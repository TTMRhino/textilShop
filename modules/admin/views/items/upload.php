<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>


<div class="container">
        
<div class="progress mb-3">
  <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
</div>

<script>
    $(document).ready(function(){
       $(".formUpload").on("submit", function(e){
           e.preventDefault();//отключили обновление страницы по клику на собмит
           
        $.ajax({
            xhr: function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function(event){
                    var  persenSuccess = Math.floor(((event.loaded / event.total) * 100))
                    $(".progress-bar").width(persenSuccess + "%");
                    $(".progress-bar").html(persenSuccess + "%");
                });
                return xhr;
            },
            type: 'POST',
            url:"<?= Url::current() ?>",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
                $(".progress-bar").width("0%");
            },
            success:function(){
                console.log('Success!!!')
            },
            error:function(){
                console.log('Error')
            }
        })
       })
    })
</script>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class'=>'formUpload']]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <button>Submit</button>



<?php ActiveForm::end() ?>
</div>


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


