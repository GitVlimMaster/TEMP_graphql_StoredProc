<?php

namespace App;

use App\Type\QueryType;
use App\Type\CatTiresType;
use GraphQL\Type\Definition\Type;

/**
 * Class Types
 *
 * Registry and type factory for GraphQL
 *
 * @package App
 */
class Types
{
    /**
     * @var QueryType
     */
    private static $query;

    /**
     * @var CatTiresType
     */
    private static $catTire;

    /**
     * @return QueryType
     */
    public static function query()
    {
        return self::$query ?: (self::$query = new QueryType());
    }

    /**
     * @return CatTiresType
     */
    public static function catTire()
    {
        return self::$catTire ?: (self::$catTire = new CatTiresType());
    }

    /**
     * @return \GraphQL\Type\Definition\IntType
     */
    public static function int()
    {
        return Type::int();
    }

    /**
     * @return \GraphQL\Type\Definition\StringType
     */
    public static function string()
    {
        return Type::string();
    }

    /**
     * @param \GraphQL\Type\Definition\Type $type
     * @return \GraphQL\Type\Definition\ListOfType
     */
    public static function listOf($type)
    {
        return Type::listOf($type);
    }
}