<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UserDocNumberDocType implements Rule
{
    public $DOC_TYPE;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($pDocType)
    {
        $this->DOC_TYPE = $pDocType;
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
        // dd($this->DOC_TYPE);
        return $this->DOC_TYPE == 'dni' || $this->DOC_TYPE == 'extranjeria';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ingrese la cantidad de digitos válidos del documento';
    }
}
