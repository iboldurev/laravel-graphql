<?php

namespace App\GraphQL\Query;

use App\User;
use GraphQL;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class Users extends Query
{
    protected $attributes = [
        'name' => 'Users',
        'description' => 'A Users query'
    ];

    public function type()
    {
        return Type::listOf(Type::nonNull(GraphQL::type('User')));
    }

    public function args()
    {
        return [
            //
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return User::all();
    }
}
