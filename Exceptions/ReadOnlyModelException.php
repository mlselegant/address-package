<?php

namespace Manohar\Address\Exceptions;

class ReadOnlyModelException extends \Exception
{
    protected $code = 403;

    public function __construct($message = "This model is read-only.")
    {
        parent::__construct($message);
    }
}
