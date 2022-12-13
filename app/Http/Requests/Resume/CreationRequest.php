<?php

namespace App\Http\Requests\Resume;

use Illuminate\Foundation\Http\FormRequest;

class CreationRequest extends FormRequest
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
            'job' => 'required|string',
            'text' => 'required_without:file|string|nullable',
            'file' => 'required_without:text|file|mimes:csv,txt,doc,pdf,docx,docs|nullable'
        ];
    }
}
