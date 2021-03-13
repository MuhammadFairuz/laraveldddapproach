<?php

namespace App\Exceptions;

use Exception;

class ErrorPredicted extends Exception
{
    public function render($request)
    {
        return respApiError('asdfasf');
    }
}
