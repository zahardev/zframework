<?php

namespace App\Exceptions;

class DbException extends AppException {
    public function __construct($message = "Db exception", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}