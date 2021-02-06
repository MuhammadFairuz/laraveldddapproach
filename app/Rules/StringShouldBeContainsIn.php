<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StringShouldBeContainsIn implements Rule
{

    private $comparationString;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($comparationString)
    {
        $this->comparationString = $comparationString;
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
        $comparationString = $this->comparationString;
        return (false !== strpos($comparationString, $value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':value is not in';
    }
}
