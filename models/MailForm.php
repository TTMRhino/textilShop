<?php

namespace app\models;

use Yii;
use yii\base\Model;

class MailForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $theme;
    public $comments;
    

    public function rules()
    {
        return [
            
            [['name', 'theme','comments','email'], 'required', 'message' => 'Данное поле обязательно!'],
            [['name','theme','email'], 'string', 'max' => 128],
            ['email','email'],
            [['phone'],'number', 'max' => 999999999, 'min' => 999]           
            
        ];
    }

}