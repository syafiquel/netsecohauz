<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\QueryException;

class DuplicateDataException extends Exception
{
    public function render()
    {
        
        return parent::render($request, $exception);
    }

}
