<?php
namespace app\models;

use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
    

    public static function tableName()
    {
        return 'orders';
    }

    public function rules()
    {
        return[

             [['item_id','customers_id','quantity','price'],'safe'],
            [['item_id','customers_id','item'],'safe'],
            [['price','total','quantity'],'safe'],                      
        ];
    }

    public function saveOrder($items, $customers_id)
    {
        /*echo "<pre>";
             print_r($items);
            echo "</pre>";*/
        
        foreach($items as $cart){
            $this->id = null;
            $this->isNewRecord = true;

            $this->item_id = $cart['id'];
            $this->item = $cart['title'];
            $this->price = $cart['price'];
            $this->quantity = $cart['qty'];
            $this->total = $cart['qty'] * $cart['price'];
            $this->customers_id = $customers_id;

            /*echo "<pre>";
             print_r($this);
            echo "</pre>";
            die;*/

            if(!$this->save()){
                return false;
            }
        }
        return true;
    }
}