<?php

namespace App\GraphQL\Scalars;

use GraphQL\Error\Error;
use GraphQL\Utils\Utils;
use GraphQL\Type\Definition\ScalarType;
use GraphQL\Language\AST\StringValueNode;
use Folklore\GraphQL\Support\Contracts\TypeConvertible;

class Email extends ScalarType implements TypeConvertible
{
    /**
     * @var string
     */
    public $name = 'Email';

    /**
     * @var string
     */
    public $description = 'The `Email` scalar type field whose value conforms to the standard internet email address format as specified in RFC822: https://www.w3.org/Protocols/rfc822/.';

    /**
     * @param mixed $value
     * @return mixed
     */
    public function serialize($value)
    {
        return $value;
    }

    /**
     * @param mixed $value
     * @return string
     * @throws Error
     */
    public function parseValue($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new Error("Cannot represent following value as email: " . Utils::printSafeJson($value));
        }

        return $value;
    }

    /**
     * @param $ast
     * @return null|string
     * @throws Error
     */
    public function parseLiteral($ast)
    {
        if (!$ast instanceof StringValueNode) {
            throw new Error('Query error: Can only parse strings got: ' . $ast->kind, [$ast]);
        }

        if (!filter_var($ast->value, FILTER_VALIDATE_EMAIL)) {
            throw new Error("Not a valid email", [$ast]);
        }

        return $ast->value;
    }

    /**
     * @return Email
     */
    public function toType()
    {
        return new static();
    }
}
