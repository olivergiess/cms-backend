<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class VerificationException extends HttpException
{
	public function __construct(int $statusCode, string $message = NULL)
    {
        parent::__construct($statusCode, $message);
    }
}
