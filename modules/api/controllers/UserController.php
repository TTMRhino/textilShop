<?php
namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\data\ActiveDataProvider;

use yii\filters\auth\HttpBasicAuth;

use app\modules\api\models\user;


class UserController extends ActiveController
{
    public $modelClass = 'app\modules\api\models\user';
    
    public $serializer = [
        'class' => 'yii\rest\Serializer',
      
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
            ],
            /*'authenticator' =>[
                'class' => HttpBasicAuth::class,
            ]*/
            'basicAuth' => [
                'class' => \yii\filters\auth\HttpBasicAuth::class,
                'auth' => function ($username, $password) {
                    $user = User::find()->where(['username' => $username])->one();
                    if ($user && $user->validatePassword($password)) {
                        return $user;
                    }
                    return null;
                },
            ],
        ];
       
        return $behaviors;
    }


    public function actions() {

        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        unset($actions['index']);


        return $actions;
    }
    

    public function actionIndex()
    {        
            $user = \Yii::$app->user->identity;
           
          
            return new ActiveDataProvider([
                'query' => User::find()->where(['id' => $user->id]),
            ]);
       
      
    }

   

   


}