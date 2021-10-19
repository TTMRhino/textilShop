<?php

namespace app\controllers;

use yii\filters\AccessControl;



class CabinetController extends AppController

{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,                
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['auth\login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,                       
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
   
    public function actionIndex()
    {

        return $this->render('index') ;
    }
}