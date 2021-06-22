<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Employee;
class UserMatchEmployee implements Rule
{
    public $EMPLOYEE_ID;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($pEmployeeId)
    {
        $this->EMPLOYEE_ID = $pEmployeeId;
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
        $userID = Employee::find($this->EMPLOYEE_ID)->user_id;
        return $value == $userID;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El usuario ingresado no se relaciona con el empleado';
    }
}
