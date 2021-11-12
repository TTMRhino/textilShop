<?php
namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\data\ActiveDataProvider;

use app\modules\api\models\Items;

class ItemsController extends ActiveController
{
    public $modelClass = 'app\modules\api\models\Items';
    
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

   public function behaviors()
    {    	
        $behaviors = parent::behaviors();
        
        
        $behaviors= [
        [
            'class' => \yii\filters\Cors::class,
               'cors' => [
                    // restrict access to
                    'Origin' => ['*'],
               // Allow  methods
                    'Access-Control-Request-Method' => ['POST', 'PUT', 'OPTIONS', 'GET'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Headers' => ['Content-Type'],
                    // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                    //'Access-Control-Allow-Credentials' => true,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 3600,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => ['*'],
                ],
                
            ],
            [
                'class' => ContentNegotiator::class,
                'formats' => 
                [
                    'application/json' => Response::FORMAT_JSON,                   
                ]
            ]
        ];
       
        return $behaviors;
    }   
  
    
    public function actionGettop()
    { 
        return new ActiveDataProvider([
            'query' => Items::find()->where(['top_product' => 1]),
        ]);
    }

    public function actionIndex()
    {        
        return new ActiveDataProvider([
            'query' => Items::find(),
            'pagination' =>[
                'pageSize' => 20
            ]
        ]);
    }

    public function actionGetByMaingroup($id,$sort)
    {        
        return new ActiveDataProvider([
            'query' => Items::find()->where(['maingroup_id' => $id ]),
            'pagination' =>[
                'pageSize' => 20
            ]
        ]);
    }

    public function actionGetBySubgroup($id,$sort)
    {        
        return new ActiveDataProvider([
            'query' => Items::find()->where(['subgroup_id' => $id ]),
            'pagination' =>[
                'pageSize' => 20
            ]
        ]);
    }

   


}