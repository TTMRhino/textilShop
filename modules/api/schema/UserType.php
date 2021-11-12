<?php

namespace app\modules\api\schema;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use app\models\User;

class UserType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function(){
                return[
                    'username' => [
                        'type' => Type::string(),
                    ],
                    'email' => [
                        'type' => Type::string(),
                    ],
                    'date_at' => [
                        'type' => Type::string(),
                        'description' => 'Date when user was created',

                        'args' => [
                            'format' => Type::string(),
                        ],

                        'resolve' => function(User $user, $args) {
                            if (isset($args['format'])) {
                                return date($args['format'], strtotime($user->createDate));
                            }

                            // коли ничего в format не пришло, 
                            // оставляем как есть
                            return $user->createDate;
                        },
                    ],
                  
                ];
            }
        ];

        parent::__construct($config);
    }
}