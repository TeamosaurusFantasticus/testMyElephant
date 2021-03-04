<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class isGit implements Rule
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
        return preg_match('^((http|https)://)?(www[.])?(github|gitlab)+([.]com)+(/[a-zA-Z0-9(-|/|=|?)?]+)+(.git)^', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Veuillez rentrer l'URL d'un repo GitHub ou GitLab";
    }
}
