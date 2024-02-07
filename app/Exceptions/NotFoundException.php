<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


class NotFoundException extends Exception
{
    public function render(Request $request, \Throwable $error)
    {
        if ($error instanceof ModelNotFoundException)
        {
            return response(status: 404)
                ->json([
                    'status'    => '404',
                    'message'   => 'Resource not found.'
                ]);
        }
    }
}
