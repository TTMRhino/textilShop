<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SubCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sub Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-category-index">

 

    <p>
        <?= Html::a('Create Sub Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'code1c',
            //'maingroup_id',
            [
                'attribute'=>'maingroup_id',
                'format'=>'raw',
                'value'=>function($data){            
                 
                return $data->getCategoryTitle($data['maingroup_id']);
              }
            ],

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
