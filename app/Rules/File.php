<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class File implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
//        var_dump(substr($value, -3)); exit;
        return  in_array(substr($value, -3), ['pdf', 'zip']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Unsupported file type';
    }
}
