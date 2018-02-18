<?php

namespace App\Exceptions;

class Model extends AppException {
    public function __construct($message = "Model exception", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}