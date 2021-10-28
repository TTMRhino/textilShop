<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\models\Organizations;


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
            [['item_id','customers_id','item','organization_id'],'safe'],
            [['price','total','quantity'],'safe'],                      
        ];
    }

    public function saveOrder($items, $customers_id, $organization_id = null)
    {
               
        foreach($items as $cart){
            $this->id = null;
            $this->isNewRecord = true;

            $this->item_id = $cart['id'];
            $this->item = $cart['title'];
            $this->price = $cart['price'];
            $this->quantity = $cart['qty'];
            $this->total = $cart['qty'] * $cart['price'];
            $this->customers_id = $customers_id;
            $this->organization_id = $organization_id;

            if(!$this->save()){
                return false;
            }
        }
        return true;
    }

    public function getCount($id){
        
        $organization_id = Organizations::findOne(['user_id'=> $id]);        

        $ordersCount = Order::find()->where(['organization_id' => $organization_id->id])->count();      

        return  $ordersCount;
    }

    public function getAllOrders($id){
        $organization_id = Organizations::findOne(['user_id'=> $id]); 

        $orders = Order::find()->where(['organization_id' => $organization_id->id])->all();
        
        return $orders;
    }
}