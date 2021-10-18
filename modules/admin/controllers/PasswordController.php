<?php

namespace app\modules\admin\controllers;

use app\models\User;

use Yii;

class PasswordController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionChange()
    {
        $modelNew = new User();
        $modelOld =new User();
        $modelOld=$modelOld::findIdentity(1);

        if($modelNew->load(Yii::$app->request->post()) ){

            $options = [
                'cost' => 12,
            ];

            $hash=password_hash($modelNew->password, PASSWORD_BCRYPT,$options);
            $modelOld->password=$hash;

            $modelOld->save(false);

            Yii::$app->session->setFlash('success', 'Пароль изменен!');
            return $this->redirect('/admin/');
        }
        return $this->render('index',compact('modelNew'));
    }

}
