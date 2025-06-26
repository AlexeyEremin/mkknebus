<?php

namespace App\Rules;

use App\Models\Activity;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NestingRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($value !== null) {
            $activity = Activity::find($value);
            if ($activity && $activity->nesting >= 2) {
                $fail("The {$attribute} nesting level must be less than 3.");
            }
        }
    }
}
