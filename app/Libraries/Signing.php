<?php

namespace App\Libraries;

class Signing
{
    public static function signArray(array $items)
    {
        $str = implode('', $items);

        $key = config('app.key');

        $signature = hash_hmac('sha256', $str, $key);

        return $signature;
    }
}
