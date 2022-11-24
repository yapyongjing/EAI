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
            'name' => 'required',
            'location' => 'required',
            'date' => 'required',
            
        ];
        
    }

    protected function prepareForValidation()
    {
        $this->merge(
            [
                'name' => strip_tags($this['name']),
                'location' => strip_tags($this->location),
                'date' => strip_tags($this->date),
            ]);
    }
}
