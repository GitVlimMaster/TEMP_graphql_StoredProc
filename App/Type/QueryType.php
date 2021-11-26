<?php

namespace App\Type;

use App\DB;
use App\Types;
use GraphQL\Type\Definition\ObjectType;

class QueryType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                    'product' => [
                        'type' => Types::catTire(),
                        'description' => 'Returns cat tire by id',
                        'args' => [
                            'id' => Types::int()
                        ],
                        'resolve' => function ($root, $args) {
                            return DB::selectOne("SELECT * FROM cat_tire WHERE id_cat_tire = {$args['id']}");
                        }
                    ],
                    'allProductsTires' => [
                        'type' => Types::listOf(Types::catTire()),
                        'description' => 'a list of products tires',
                        'resolve' => function () {
                            return DB::select('call strGetAllProductsTires()');
                        }
                    ]
                ];
            }
        ];
        parent::__construct($config);
    }
}