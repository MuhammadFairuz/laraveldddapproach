<?php

namespace App\Exceptions;

use Exception;

class EmailHasBeenCompormised extends Exception
{
    public function render($request)
    {
        return respApiError('Email has been compormised');
    }
}
