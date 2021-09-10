<?php

namespace app\controllers;

use app\models\Items;


class HomeController extends AppController
{
    public function actionIndex()
    {
        $top_product=  Items::find()->where(['top_product' => '1'])->all();  
        
        //var_dump($top_product);die;

        return $this->render('index',compact('top_product'));
    }
}