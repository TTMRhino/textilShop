<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Organizations */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="organizations-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            //'id',
            'discount',
            //'user_id',
            [
                'attribute' => 'user_id',
                
                'value' => function($data){
                       $user = User::findOne(['id'=> $data->user_id]);                    
                        return $user->email;
                    }             
            ],
            'name',
            'inn',
            'ogrn',
            'kpp',
            'adres_registr',
            'adres_fact',
            'pay_account',
            'kor_account',
            'bik_bank',
            'bank_name',
            
        ],
    ]) ?>


<h1>История заказорв</h1>

<?= GridView::widget([
     'dataProvider' => $orderProvider,

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
     ]
]); ?>

<h2>И того: <span class="text-primary"><?= $orderTotalSum ?> руб.</span></h2>
</div>

