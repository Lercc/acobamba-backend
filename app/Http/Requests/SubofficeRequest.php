<?php

namespace App\Http\Requests;

use App\Models\Office;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SubofficeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $objectOffice =  Office::get('id');
        $arrayIdOffices= [];

        foreach ($objectOffice as $ep) {
            array_push($arrayIdOffices, $ep->id);
        }
   
        return [
            'office_id'    => ['required', 'numeric', Rule::in($arrayIdOffices)],
            'name'         => ['required', 'max:200', 'regex:/^[\pL\s\-]+$/u'],
            'status'       => ['required', 'string', 'max:11', Rule::in(['activado', 'desactivado'])]
        ];
    }
}
