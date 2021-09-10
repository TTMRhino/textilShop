<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Customers extends ActiveRecord
{
    

    public static function tableName()
    {
        return 'customers';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['data'],                    
                ],
                // если вместо метки времени UNIX используется datetime:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function rules()
    {
        return[
            [['name','phone','adress','city'],'required'],
            [['comments','orders_id','mailindex'],'string'],            
            [['data','status'],'safe']
        ];
    }

    public function attributeLabels()
    {
        return[
            'name'=>"Имя",
            'phone'=>'Телефон',
            'adress'=>'Адрес',
            'city'=>'Город',
            'mailindex'=>'Почтовый индекс',
            'data'=>'Дата',
            'status'=>'Статус',
            'orders_id'=>'ID заказа',
            'comments'=> 'Коментарий'
        ];
    }

    
    
}