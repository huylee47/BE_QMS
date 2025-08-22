<?php

declare(strict_types=1);

namespace App\Concerns;

use Exception;

trait EnumTrait
{
    /**
     * Get enum cases as an associative array with names as keys and values as values.
     *
     * @return array<string, string|int>
     */
    public static function toArray(): array
    {
        // Using the built-in cases() method available in PHP 8.1+ for enums
        $cases = static::cases();
        $enumArray = [];
        foreach ($cases as $case) {
            $enumArray[$case->name] = $case->value;
        }

        return $enumArray;
    }

    /**
     * Get all enum labels (names).
     *
     * @return array<int, string>
     */
    public static function labels(): array
    {
        return array_keys(static::toArray());
    }

    /**
     * Get all enum values.
     *
     * @return array<int, string|int>
     */
    public static function values(): array
    {
        return array_values(static::toArray());
    }

    /**
     * Get a random enum case.
     *
     * @return static A random enum case.
     */
    public static function randomCase(): static
    {
        $cases = static::cases();
        return $cases[array_rand($cases)];
    }

    /**
     * Get a random enum case.
     *
     * @throws Exception
     */
    public static function randomCaseOfFail(): static
    {
        return static::randomCase();
    }
}
