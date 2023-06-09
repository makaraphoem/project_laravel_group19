<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class DroneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success' => false, 'message' => $validator->errors()], 412));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'drone_id' => [
                'required',
                Rule::unique('drones')->ignore($this->id),
            ],
            'drone_name' => [
                'required',
                'min:3',
                'max:20',
                Rule::unique('drones')->ignore($this->id),
            ],
            'drone_type' => 'required',
            'sensor' => 'required',
            'playoad_capacity' => 'required',
            'batter_life' => 'required',
            'user_id'=>'required',
        ];
    }
}
