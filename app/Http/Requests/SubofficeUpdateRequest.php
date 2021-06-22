<?php

namespace App\Http\Requests;

use App\Models\Office;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SubofficeUpdateRequest extends FormRequest
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
        $objectOffice = Office::get('id');
        $arrayOffice= [];
        foreach ($objectOffice as $el) {
            array_push($arrayOffice, $el->id);
        }


        
        return [
         
            'office_id'  => ['required', 'numeric', Rule::in($arrayOffice)],
            'name'       => ['required', 'max:80', 'regex:/^[\pL\s\-]+$/u'],
            'status'     => ['required', 'string', 'max:11', Rule::in(['activado', 'desactivado'])]
        ];
    }
}
