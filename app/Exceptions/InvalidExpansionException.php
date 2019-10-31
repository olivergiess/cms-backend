<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class InvalidExpansionException extends HttpException
{
	public function __construct(int $statusCode = 400, string $message = 'Invalid relationship in Expansion.')
    {
        parent::__construct($statusCode, $message);
    }
}
