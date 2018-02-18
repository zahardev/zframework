<?php

namespace App;

use Throwable;

class MultiException
    extends \Exception
    implements \ArrayAccess, \Iterator
{
    use TCollection;
    use Singleton;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
