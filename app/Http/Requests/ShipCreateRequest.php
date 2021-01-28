<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipCreateRequest extends FormRequest
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
            'name' => 'required|regex:/^[A-Za-z1-9]{2,50}$/',
            'serial' => 'required|unique:ships,serial_number|size:8',
            'image' => 'required|image|max:3096',
            'crews' => 'required|exists:users,id'
        ];
    }
}
