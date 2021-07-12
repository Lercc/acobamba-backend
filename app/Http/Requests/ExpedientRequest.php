<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Processor;
use App\Models\Employee;
use Illuminate\Validation\Rule;

class ExpedientRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $objectProcessors =  Processor::get('id');
        $arrayIdProcessor= [];
        foreach ($objectProcessors as $el) {
            array_push($arrayIdProcessor, $el->id);
        }
        
        $objectEmployees =  Employee::get('id');
        $arrayIdEmployee= [];
        foreach ($objectEmployees as $el) {
            array_push($arrayIdEmployee, $el->id);
        }

        return [
            // 'user_id'         => ['required', 'numeric'],
            'processor_id'    => ['nullable', 'numeric', Rule::in($arrayIdProcessor)],
            'employee_id'     => ['nullable', 'numeric', Rule::in($arrayIdEmployee)],
            // 'code'            => ['required', 'alpha_num','max:30'],
            'document_type'   => ['required', 'string', 'max:200'],
            'header'          => ['required', 'string', 'max:220'],
            'subject'         => ['required', 'string', 'max:200'],
            'folios'          => ['required', 'numeric', 'min:1', 'max:100'],
            'file'            => ['required', 'mimes:pdf,docx,doc,xlsx,xls,zip,rar,pptx,ppt,png,jpg,jpeg'],
            'status'          => ['required', 'string', 'max:11', Rule::in(['activado', 'desactivado'])],
        ];
    }
}