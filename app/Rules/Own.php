<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Own implements Rule
{
    protected $resource;

    /**
     * Create a new rule instance.
     *
     * @param  mixed  $resource
     * @param  string  $action
     * @return void
     */
    public function __construct($resource)
    {
        $this->resource = $resource;
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
        $user = auth()->user();

        return $user->can('owns', [$this->resource, $value]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You must own :field';
    }
}
