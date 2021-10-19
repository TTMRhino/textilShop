<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\RegForm;


class AuthController extends AppController
{

   
    public function actionIndex()
    {               
        //var_dump($top_product);die;       

        return $this->render('index');
    }

    public function actionLogin(){

        $model = new LoginForm();

        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            
            return $this->redirect('/cabinet');
        }

        return $this->render('login',compact('model'));
    }

    public function actionRegistration(){

        $model = new RegForm();
       
        if ($model->load(\Yii::$app->request->post()) ){    
            
            $options = [
                'cost' => 12,
            ];

            $hash=password_hash($model->password, PASSWORD_BCRYPT,$options);
            $model->password=$hash;
            $model->password_repeat = $hash;

            $model->save();

            \Yii::$app->session->setFlash('success','Регистрация успешно выполненна!');
            return $this->refresh();         
        }else{
            \Yii::$app->session->setFlash('error','Упс! Что то пошло не так. Повторите еще раз.'); 
        }

        return $this->render('registration', compact('model'));
    }

    
}