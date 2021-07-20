<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DerivationUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $objectEmployee = Employee::get('id');
        $arrayEmployee= [];
        foreach ($objectEmployee as $el) {
            array_push($arrayEmployee, $el->id);
        }
        
        return [
            'employee_id'  => ['required', 'numeric', Rule::in($arrayEmployee)],
            'status'       => ['required', 'string', 'max:11', Rule::in(['nuevo','derivado'])]
        ];
    }
}
