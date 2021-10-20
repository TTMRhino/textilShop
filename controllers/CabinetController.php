<?php

namespace app\controllers;

use yii\filters\AccessControl;
use app\models\Organizations;



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
        $user = \Yii::$app->user->identity;

        $organization = Organizations::findOne(['user_id' => $user->id]);

       /* echo "<pre>";
        print_r( $organization->inn);
        echo "</pre>";
        die;*/

        return $this->render('index',compact('organization')) ;
    }

    
}