<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use Illuminate\Contracts\Validation\Rule;
class CustomAlphabetRule implements ValidationRule
{


    public function passes($attribute, $value)
    {
        // Validation avec une expression régulière pour autoriser les lettres de l'alphabet (majuscules ou minuscules) ainsi que certains caractères spéciaux
        return preg_match('/^[A-Za-zÀ-ÿ\- ]+$/', $value);
    }
    public function message()
    {
        return 'Le champ :attribute doit contenir uniquement les lettres de l\'alphabet (majuscules ou minuscules) et les caractères spéciaux "-", " "';
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}



