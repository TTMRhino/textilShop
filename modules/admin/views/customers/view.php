<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\modules\admin\models\Items;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Customers */

$this->title = "Заказ №{$model->id}";
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customers-view">

   

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
            'name',
            'phone',
            'mailindex',
            'city',
            'adress',           
            'data',
            //'status',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data){
                    if($data->status == 'Work' ){
                        return   '<span style="background-color:#66FF66">В работе</span>';
                    }else{
                        return '<span style="background-color:red">Не взят в работу</span>';
                    }
                
                }
              ],
              'comments',
           // 'orders_id',
        ],
    ]);?>

<h1>Содержание заказа</h1>

<?= GridView::widget([
        'dataProvider' => $orderProvider,
        //'filterModel' => $searchBooking,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],                        
            
            'item',
            [
                'format' => 'raw',
                'value'=> function($data)
                {
                    $imgVendor = $data->getVendorItem($data['item_id']); 
                   
                    return "<div class='pro-img'>
                            <a href='/img/products/l". $imgVendor . ".jpg' data-toggle='lightbox'>
                                <img style='height:70px;'class='img-fluid mb-2' 
                                src= '/img/products/l". $imgVendor .".jpg' alt='white sample' data-gallery='gallery'/>
                            </a>
                          </div>";                          
                }
            ],
            'quantity',
            'price',
            'total',
           
            
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} ',
                'buttons' => [
                    'update' => function ($url,$orderProvider) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', Url::to(['/admin/order/update', 'id'=>$orderProvider->id]));
                    },
                    'view' => function ($url,$orderProvider) {
                        return Html::a('<i class="far fa-eye"></i>',Url::to(['/admin/order/view', 'id'=>$orderProvider->id]));
                    },
                    'delete' => function ($url,$orderProvider) {
                        return Html::a('<i class="far fa-trash-alt"></i>', 
                            Url::to(['/admin/order/delete', 'id'=>$orderProvider->id]),
                            ['data'=>['confirm' => 'Вы уверены  что хотите удалить запись?',
                            'method' => 'post',]
                            ]);
                    },
                    
                ],
                'header' =>"actions",
            ],
        ],
    ]);
    ?>
    <h2>И того: <span class="text-primary"><?= $orderTotalSum ?> руб.</span></h2>

   


</div>
