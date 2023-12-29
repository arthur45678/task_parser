<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Maatwebsite\Excel\Facades\Excel;

class ExcelFile implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        Excel::filter('chunk')->load($value)->chunk(1, function ($results) {
            // You can add more specific validation rules here if needed
           // return true;
        });
    }
}
