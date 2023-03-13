<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use LaravelLegends\PtBrValidator\Rules\Cns;
use LaravelLegends\PtBrValidator\Rules\Cpf;

class PatientAddRequest extends FormRequest
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
            'name' => 'required|string',
            'mothers_name' => 'required|string',
            'birth_date' => 'required|date',
            'CPF' => ['required', new Cpf],
            'CNS' => ['required', new Cns],
            'photo' => 'required|string',
            'address' => 'required|string'
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
