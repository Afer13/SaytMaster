<?php

namespace App\Rules;

use App\Models\ApplicationType;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TypeCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!ApplicationType::where('id', $value)->exists()) {
            $fail('Seçtiyiniz tip mövcud deyil!');
        }
    }
}
