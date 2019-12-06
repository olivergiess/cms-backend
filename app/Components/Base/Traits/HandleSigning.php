<?php

namespace App\Components\Base\Traits;

use App\Libraries\Signing;
use App\Exceptions\SignatureException;
use Carbon\Carbon;

trait HandleSigning
{
    private $expiry = 24;

    private function createSignature(array $payload)
    {
        return Signing::signArray($payload);
    }

    private function checkSignature(string $signature, array $payload)
    {
        if($signature !== $this->createSignature($payload))
        {
            throw new SignatureException(403, 'Invalid token.');
        }
    }

    private function checkExpiry(int $expiry)
    {
        if($expiry < $this->getNow())
        {
            throw new SignatureException(403, 'Token has expired.');
        }
    }

    private function getNow()
    {
        return Carbon::now()->timestamp;
    }

    private function getExpiry()
    {
        return Carbon::now()->addHours($this->expiry)->timestamp;
    }
}
