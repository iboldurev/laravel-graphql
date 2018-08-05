<?php

namespace App\GraphQL\Interfaces;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\InterfaceType;

class Node extends InterfaceType
{
    protected $attributes = [
        'name' => 'Node',
        'description' => 'An object with an ID.',
    ];

    public function fields() {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of the object.',
            ],
        ];
    }
}
