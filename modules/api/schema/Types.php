<?php 

namespace app\modules\api\schema;

use GraphQL\Type\Definition\ObjectType;

class Types
{
    private static $query;
    private static $mutation;

    private static $user;
    private static $organizations;
    private static $city;


    public static function query()
    {
        return self::$query ?: (self::$query = new QueryType());
    }

    public static function user()
    {
        return self::$user ?: (self::$user = new UserType());
    }

    public static function organizations()
    {
        return self::$organizations ?: (self::$organizations = new OrganizationsType());
    }

    

}