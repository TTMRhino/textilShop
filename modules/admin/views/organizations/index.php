<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\OrganizationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organizations';
$this->params['breadcrumbs'][] = [
    'template' => "<li> > {link}</li>\n",
    'label' => $this->title,
];
?>
<div class="organizations-index">

    

    <p>
        <?= Html::a('Create Organizations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            'name',
            'inn',
            //'ogrn',
            //'kpp',
            //'adres_registr',
            'adres_fact',
            'pay_account',
            //'kor_account',
            //'bik_bank',
            'bank_name',
            'discount',

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
