<?php

namespace app\controllers;

use app\models\Items;
use app\models\Cart;
use app\models\Order;
use app\models\Customers;
use app\models\Organizations;




class CartController extends AppController
{
    public function actionIndex()
    {
        
        return $this->render('cart');
    }

    public function actionAdd($id)
    {
        $item = Items::findOne(['id'=>$id]);
        
        if(empty($item)){
            return false; 
        }
        
        $session = \Yii::$app->session;
        $session->open();
        //$session->destroy();

        $cart = new Cart();
        $cart->addToCart($item);

        if(\Yii::$app->request->isAjax){           
            return $this->renderPartial('cartmini',compact($session));           
        }

        return $this->redirect(\Yii::$app->request->referrer);        
    }

    

    public function actionDelItem($id)
    {      
        $session = \Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->recalc($id);
       

        if(\Yii::$app->request->isAjax){           
            return $this->renderPartial('cartmini',compact($session));           
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionShowTableCart($id, $qty=1)    
    {
        $session = \Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->recalc($id);
        

        if(\Yii::$app->request->isAjax){
           
            return $this->renderPartial('cartTable',compact($session));
        }

        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionChangeCart($id, $qty)
    {
        $item = Items::findOne(['id'=>$id]);
        
        if(empty($item)){
            return false; 
        }

        $session = \Yii::$app->session;
        $session->open();
        //$session->destroy();

        $cart = new Cart();
        $cart->addToCart($item, $qty);

        return $this->renderPartial('cartmini',compact($session));

    }

    public function actionGetBill(){
        $session = \Yii::$app->session;
        $session->open();
        $cart = $session['cart'];
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        getPdfBill($cart);
    }

    public function actionCheckout()
    {
        $session = \Yii::$app->session;
        $session->open();

        $order = new Order();
        $customer = new Customers();
        //$item = new Items();

        if(!\Yii::$app->user->isGuest ){
        
            $user = \Yii::$app->user->identity;
            $organization = Organizations::findOne(['user_id' => $user->id]);
         
            
           
                foreach($session['cart'] as $cart){
                    $item = Items::find()->where(['id' => $cart['id']])->one();                
                    $item->remains = $item->remains - $cart['qty'] ; 
                    $item->save();
                }
            
               
    
                $transaction = \Yii::$app->getDb()->beginTransaction();
    
                if( !$order->saveOrder($session['cart'], $customer->id, $organization->id) ){
                  
                    \Yii::$app->session->setFlash('error','Ошибка оформления заказа');
                     $transaction->rollBack();
                }else{            
                    $transaction->commit();
                    \Yii::$app->session->setFlash('success','Ваш заказ принят!');
     
                    try{
     
                     \Yii::$app->mailer->compose('order',['session' => $session])
                     ->setFrom([\Yii::$app->params['senderEmail'] => \Yii::$app->params['senderName'] ])
                     ->setTo(\Yii::$app->params['adminEmail'])
                     ->setSubject('Заказ ')
                     ->send();
                     
                    }catch (\Swift_TransportException $e){
                     var_dump($e);die;
                    }
                   
                    //getPdfBill($session['cart']);
                  
                   // $cart = $session['cart'];
                   
     
    
                    
               
                   //return $this->refresh();
                   return $this->render('bill');
     
            }
                        //return $this->render('bill',compact('cart'));
            

        }

      /** ====================== для гостей ============================ */  
        
        if ($customer->load(\Yii::$app->request->post()) && \Yii::$app->user->isGuest){ 

           
            foreach($session['cart'] as $cart){
                $item = Items::find()->where(['id' => $cart['id']])->one();                
                $item->remains = $item->remains - $cart['qty'] ; 
                $item->save();
            }
            
            $transaction = \Yii::$app->getDb()->beginTransaction();    
            
           if(!$customer->save() || !$order->saveOrder($session['cart'], $customer->id) ){
              
               \Yii::$app->session->setFlash('error','Ошибка оформления заказа');
                $transaction->rollBack();
           }else{            
               $transaction->commit();
               \Yii::$app->session->setFlash('success','Ваш заказ принят!');

               try{

                \Yii::$app->mailer->compose('order',['session' => $session])
                ->setFrom([\Yii::$app->params['senderEmail'] => \Yii::$app->params['senderName'] ])
                ->setTo(\Yii::$app->params['adminEmail'])
                ->setSubject('Заказ ')
                ->send();
                
               }catch (\Swift_TransportException $e){
                var_dump($e);die;
               }
              

               $session->remove('cart');
               $session->remove('cart.qty');
               $session->remove('cart.sum');

               return $this->refresh();
           }
           
        }

        return $this->render('checkout',compact('session', 'order', 'customer'));
    }



    
}