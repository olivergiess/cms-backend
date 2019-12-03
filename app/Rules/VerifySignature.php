<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Libraries\Signing;

class VerifySignature implements Rule
{
    protected $items;

    /**
     * Create a new rule instance.
     *
     * @param  mixed  $items
     * @return void
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value === Signing::signArray($this->items);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is invalid';
    }
}
