<?php

namespace app\modules\api\schema;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class OrganizationsType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                    'user_id' => [
                        'type' => Types::user(),
                    ],
                	'name' => [
                		'type' => Type::string(),
                	],
                    'inn' => [
                		'type' => Type::string(),
                	],
                    'ogrn' => [
                		'type' => Type::string(),
                	],
                    'kpp' => [
                		'type' => Type::string(),
                	],
                    'adres_registr' => [
                		'type' => Type::string(),
                	],
                    'adres_fact' => [
                		'type' => Type::string(),
                	],
                    'pay_account' => [
                		'type' => Type::string(),
                	],
                    'kor_account' => [
                		'type' => Type::string(),
                	],
                    'bik_bank' => [
                		'type' => Type::string(),
                	],
                    'bank_name' => [
                		'type' => Type::string(),
                	],
                    'discount' => [
                		'type' => Type::int(),
                	],
                    
                ];
            }
        ];

        parent::__construct($config);
    }

}