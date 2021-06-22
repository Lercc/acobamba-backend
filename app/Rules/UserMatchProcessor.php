<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Processor;

class UserMatchProcessor implements Rule
{
    public $PROCESSOR_ID;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($pProcesorId)
    {
        $this->PROCESSOR_ID = $pProcesorId;
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
        $userID = Processor::find($this->PROCESSOR_ID)->user_id;
        return $value == $userID;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El usuario ingresado no se relaciona con el tramitante';
    }
}
