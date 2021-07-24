<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class CurrentPasswordValidation implements Rule
{
    public $USER_ID;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($pUserId)
    {
        $this->USER_ID = $pUserId;
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
        $user = User::findOrFail($this->USER_ID);
        return password_verify($value, $user->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La contraseña actual no es correcta';
    }
}
