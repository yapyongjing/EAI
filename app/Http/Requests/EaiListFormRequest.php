<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EaiListFormRequest extends FormRequest
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
        
            'work_name' => 'required',
            'con' => 'required',
            'aspect' => 'required',
            'impact' => 'required',
            
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(
            [
                'work_name' => strip_tags($this['work_name']),
                'aspect' => strip_tags($this->aspect),
                
            ]);
    }
}
