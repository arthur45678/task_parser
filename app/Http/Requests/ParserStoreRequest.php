<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => [
                'required',
                'file',
                'mimes:xlsx',
                function ($attribute, $value, $fail) {
                    $allowedExtensions = ['xlsx'];
                    $extension = $value->getClientOriginalExtension();

                    if (!in_array($extension, $allowedExtensions)) {
                        $fail("{$attribute} Файл должен быть формата Excel: " . implode(', ', $allowedExtensions));
                    }
                },
            ],
        ];
    }
}
