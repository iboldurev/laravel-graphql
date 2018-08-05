<?php

namespace App\GraphQL\Type;

use GraphQL;
use App\GraphQL\Scalars\Email;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;

class User extends BaseType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A User type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user',
//                'deprecationReason' => 'test' // Устарело
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the user'
            ],
            'email' => [
                'type' => Type::nonNull(new Email()),
                'description' => 'The email of the user'
            ]
        ];
    }

    public function interfaces() {
        return [
            GraphQL::type('Node')
        ];
    }
}
