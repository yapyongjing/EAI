<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationFormRequest extends FormRequest
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
            'location' => 'required',
            'name' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(
            [
                'location' => strip_tags($this['location']),
                'name' => strip_tags($this['name'])
            ]);
    }
}
