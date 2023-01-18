<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'opr_name' => 'required',
            'location_name' => 'required',
            'date' => 'required',
            'work_name' => 'required',
            'con' => 'required',
            'aspect' => 'required',
            'impact' => 'required',
            'rqm' => 'required'
        ];
        
    }

    protected function prepareForValidation()
    {
        $this->merge(
            [
                'opr_name' => strip_tags($this['opr_name']),
                'location' => strip_tags($this['location']),
                'date' => strip_tags($this['date']),
                'work_name' => strip_tags($this['work_name']),
                'aspect' => strip_tags($this['aspect']),
                'rqm'=> strip_tags($this['rqm'])
            ]);
    }
}
