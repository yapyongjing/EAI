<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AspectImpactFormRequest extends FormRequest
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
            'aspect' => 'required',
            'impact' => 'required',
            'fkey' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(
            [
                'aspect' => strip_tags($this['aspect']),
                'fkey'=> strip_tags($this['fkey'])
                
                
            ]);
    }
}
