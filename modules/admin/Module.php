<?php

namespace app\modules\admin;

use yii\filters\AccessControl;
use app\modules\admin\models\Customers;
use Yii;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        //подсчет новых заказов и передача их в шаблон .
        $newOrders = Customers::find()->where(['status' => 'New'])->select('status')->count();
        Yii::$app->view->params['new'] = $newOrders;

        parent::init();
        
    
        
    }


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,                
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,                       
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
}
