<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Dispoable implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /**
         * Initial path for the dispoable domain list
         * 
         * @var string $path
         */
        $path = public_path("storage/disposables.txt");

        /**
         * Retrive the domains as array using the file function
         * 
         * @var array<int, string> | bool $domains
         */

        $domains = @file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        /**
         * extract the domain from the email
         * 
         * @var string $email_domain
         */

        $email_domain = @explode("@", $value)[1];

        /**
         * Check if the domain exists in the file
         */

        in_array($email_domain, $domains)
            &&
            $fail("Provided :attribute is A disposable email, we do not accept it. Please try again later");
    }
}
