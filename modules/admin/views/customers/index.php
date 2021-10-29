<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты и заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-index">

   

    <p>
        <?= Html::a('Добавить заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions' => function ($model, $key, $index, $grid)
        {
            if($model->status == 'New') {
              //Не взята в работу заявка
              return ['style' => 'background-color:#FF6666;'];
            }elseif ($model->status == 'Work') {
              //В работе заявка
              return ['style' => 'background-color:#66FF66;','<span>В работе</span>'];
              
            }else if($model->status == 'Done'){
                return ['style' => 'background-color:#778899;']; 
            }
        },

        'columns' => [          

            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',           
            'phone',
            'mailindex',
            'city',
            'adress',
            //'comments',
            'data',
            'status',
            //'orders_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} ',
                'buttons' => [
                    'update' => function ($url,$model) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', $url);
                    },
                    'view' => function ($url,$model) {
                        return Html::a('<i class="far fa-eye"></i>', $url);
                    },
                    'delete' => function ($url,$model) {
                        return Html::a('<i class="far fa-trash-alt"></i>', $url,['data'=>[
                            'confirm' => 'Вы уверены  что хотите удалить запись?',
                            'method' => 'post',]
                            ]);
                    },
                    
                ],                
                'header' =>"actions",
            ],
        ],
    ]); ?>


</div>
