<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\DB;
use App\Types;
use GraphQL\GraphQL;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;

try {
    // DB connection settings 
    $config = [
        'host' => 'database-bridgestone-van-instance-1.ca8ifldrkqpi.us-east-2.rds.amazonaws.com',
        'database' => 'Bridgestone_VAN',
        'username' => 'adminBS',
        'password' => 'xDAZB)3uF=sgm(Y'
    ];

    // Initialize the database connection 
    DB::init($config);

    // Receive request 
    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    $query = $input['query'];

    // Create schema
    $schema = new Schema([
        'query' => Types::query()
    ]);

    // Execute the request 
    $result = GraphQL::executeQuery($schema, $query);
} catch (\Exception $e) {
    $result = [
        'error' => [
            'message' => $e->getMessage()
        ]
    ];
}

// Outputting the result 
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($result);