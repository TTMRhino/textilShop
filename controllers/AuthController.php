<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\RegForm;
use app\models\User;


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
            $model->email_confirm  = rand(10000, 99999);
            $model->save();

             //SEND MAIL
             $this->sendMailConfirm($model->email,$model->id, $model->email_confirm);
           

            \Yii::$app->session->setFlash('success','Регистрация успешно выполненна! Вам на почту отправленно письмо для подтверждения email.');
            return $this->refresh();         
        }else{
            \Yii::$app->session->setFlash('error','Упс! Что то пошло не так. Повторите еще раз.'); 
        }

        return $this->render('registration', compact('model'));
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->redirect('/');
    }

    public function sendMailConfirm($email,$id,$rnd_num){
        try{
            \Yii::$app->mailer->compose()
            ->setFrom('ipbondareves@mail.ru')
            ->setTo($email)
            ->setSubject('Регисрация на Fatin74.ru')
            ->setHtmlBody('
                <b>Для подтверждения регистрации перейдите пожалуста по ссылке ниже:</b><br/>
                    <a href="http://textileshop/auth/mail-confirm?id='. $id .'&rnd_num='. $rnd_num .'"> Поттвержение почтового ящика </a>
                    <br/>
                <b>Если вы не регистрировались на Fatin74.ru то просто проигнорируйте это письмо.</b>
                '                        
                )
            ->send();

            \Yii::$app->session->setFlash('success', 'Сообщение отправленно!');

           }catch (\Swift_TransportException $e){
            var_dump($e);die;
           }
    }


    public function actionMailConfirm($id, $rnd_num){
        $confirm = false;
        $user = User::findOne(['id'=> $id]);
        if ($user->email_confirm == $rnd_num){

            $user->email_confirm = 'confirm';
            $user->save(false);

            $confirm = true;
            return $this->render('mailConfirm',compact('confirm'));
        }
        return $this->render('mailConfirm',compact('confirm'));
    }

    
}