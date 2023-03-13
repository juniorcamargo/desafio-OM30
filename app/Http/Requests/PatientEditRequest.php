<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use LaravelLegends\PtBrValidator\Rules\Cns;
use LaravelLegends\PtBrValidator\Rules\Cpf;

class PatientEditRequest extends FormRequest
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
            'name' => 'string',
            'mothers_name' => '|string',
            'birth_date' => '|date',
            'CPF' => [new Cpf],
            'CNS' => [new Cns],
            'photo' => 'string',
            'address' => ''
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => true
        ], 422));
    }
}
