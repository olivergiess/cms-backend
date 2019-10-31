<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class InvalidFilterException extends HttpException
{
	public function __construct(int $statusCode = 400, string $message = 'Invalid filter in Filters.')
    {
        parent::__construct($statusCode, $message);
    }
}
