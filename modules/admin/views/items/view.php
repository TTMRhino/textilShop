<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Items */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="items-view">

    

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'vendor',
            'maingroup_id',
            'subgroup_id',
            'item',
            [
                'attribute'=> 'item',
                'format' => 'raw',
                'value'=> function($model)
                {
                    
                    $imgVendor = $model->getImageVendor(); 
                   
                    return "<div class='pro-img'>
                            <a href='/img/products/l". $imgVendor . ".jpg' data-toggle='lightbox'>
                                <img style='height:70px;'class='img-fluid mb-2' 
                                src= '/img/products/l". $imgVendor .".jpg' alt='white sample' data-gallery='gallery'/>
                            </a>
                          </div>";                          
                }
            ],
            'price',
            'pur_price',
            'description:ntext',
            'old_price',
            'remains',
            [
                'attribute'=> 'top_product', 
                'value'=>function($model)
                {

                    if ($model->top_product == 1){
                        return 'Да';
                    }else{
                        return "Нет";
                    }
                }
            ],
            //'top_product',
        ],
    ]) ?>

</div>
