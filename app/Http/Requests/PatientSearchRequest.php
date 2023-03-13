<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientSearchRequest extends FormRequest
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
        return [
            'CPF' => 'nullable|string',
            'name' => 'nullable|string'
        ];
    }

    public function getSearchCallback()
    {
        return function ($query) {

            $filters = $this->only('name', 'CPF');

            foreach ($filters as $name => $value) {
                if ($value) {
                    $query->where($name, 'LIKE', '%' . $value . '%');
                }
            }
        };
    }
}
