<?php

namespace App\Type;

use App\DB;
use App\Types;
use GraphQL\Type\Definition\ObjectType;

/**
 * Class CatTiresType
 *
 * Тип User для GraphQL
 *
 * @package App\Type
 */
class CatTiresType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'description' => 'CatTiresType',
            'fields' => function() {
                return [
                    'id_cat_tire' => [
                        'type' => Types::string(),
                        'description' => 'CatTires ID'
                    ],
                    'tire_code' => [
                        'type' => Types::string(),
                        'description' => 'Tire Code'
                    ],
                    'tire_description' => [
                        'type' => Types::string(),
                        'description' => 'Tire Description'
                    ],
                    /*'tire_size' => [
                        'type' => Types::listOf(Types::user()),
                        'description' => 'Tire Size',
                        'resolve' => function ($root) {
                            return DB::select("SELECT u.* from friendships f JOIN users u ON u.id = f.friend_id WHERE f.user_id = {$root->id}");
                        }
                    ],
                    'countFriends' => [
                        'type' => Types::int(),
                        'description' => 'Number of user s friends',
                        'resolve' => function ($root) {
                            return DB::affectingStatement("SELECT u.* from friendships f JOIN users u ON u.id = f.friend_id WHERE f.user_id = {$root->id}");
                        }
                    ]*/
                ];
            }
        ];
        parent::__construct($config);
    }
}