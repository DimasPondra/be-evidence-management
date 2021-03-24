<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterEvidenceRequest extends FormRequest
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
            'register_number' => 'required|integer',
            'register_date' => 'required|date',
            'suspect' => 'required|string|max:255',
            'article' => 'required|string|max:255',
            'prosecutor' => 'required|string|max:255'
        ];
    }
}
