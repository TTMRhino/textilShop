<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\RegForm;


class CabinetController extends AppController
{

   
    public function actionIndex()
    {               
        //var_dump($top_product);die;       

        return $this->render('index');
    }

    public function actionLogin(){

        $model = new LoginForm();
        return $this->render('login',compact('model'));
    }

    public function actionRegistration(){

        $model = new RegForm();
        return $this->render('registration', compact('model'));
    }
}