<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;


class RegForm extends ActiveRecord
{
    
   
    public $password_repeat;
  
    public $verifyCode;
  


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password','email'], 'required'],
            [['email'], 'email'],
            [ ['email'], 'unique'],         
            ['verifyCode', 'captcha'],
            //[['password'],'safe'],
            [['password_repeat'] ,'compare','compareAttribute'=>'password','message'=>'пароли не совпадают!'],
            [['auth_key'],'safe'],
            [['email'],'string','max'=>50],
            [['password'],'string','max'=>80],
        ];
    }

    public static function tableName()
    {
        return 'user';
    }


   /* public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }*/

    
}
