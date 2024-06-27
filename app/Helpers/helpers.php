<?php

/**
 * Checks if the provided `Value` does exists or not in a array
 * it strictly checks the value and Returns bool
 * 
 * @param mixed $target
 * @param array $array
 * 
 * @return bool
 */

if (!function_exists("strictCheckValue")) {
    function strictCheckValue(mixed $target, array $array): bool
    {
        foreach ($array as $value) {
            if ($value === $target) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists("badgeSpinner")) {
    function badgeSpinner($target)
    {
        return '
            <svg wire:loading wire:target="'.$target .'"
                class="animate-spin -ml-1 mt-1 mr-3 h-4 w-3 text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10"
                    stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
        ';
    }
}
