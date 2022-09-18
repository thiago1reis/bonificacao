<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovementStoreRequest extends FormRequest
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
            'movement_type' => ['required'],
            'value' =>['required', 'min:0'],
            'note' => ['required'] 
        ];
    }
}
