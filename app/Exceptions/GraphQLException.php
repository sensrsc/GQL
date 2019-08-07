<?php

namespace App\Exceptions;

class GraphQLException
{
    public static function formatError(\Exception $exception)
    {
        return [
            'message' =>  $exception->getMessage()
        ];
    }
}
