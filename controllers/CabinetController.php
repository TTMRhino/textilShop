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

        if($user->username == 'admin'){

            return $this->redirect('/admin');
        }

        if ($organization->load(\Yii::$app->request->post()) && $organization->validate()){ 
            /*$user = \Yii::$app->user->identity;
            echo"<pre>";
            print_r($user);
            echo"</pre>";
            die();*/

            $organization->user_id = $user->id;

            $organization->save(false);

        }

        return $this->render('index',compact('organization')) ;
    }

    
}