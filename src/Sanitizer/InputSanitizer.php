<?php

declare(strict_types=1);

namespace SentinelGuard\Sanitizer;

use SentinelGuard\Contracts\SanitizerInterface;

final class InputSanitizer implements SanitizerInterface
{
    public function cleanString(string $input): string
    {
        $trimmed = trim($input);
        return htmlspecialchars($trimmed, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    public function cleanArray(array $input): array
    {
        $cleaned = [];
        foreach ($input as $key => $value) {
            $cleanKey = is_string($key) ? $this->cleanString($key) : $key;
            if (is_array($value)) {
                $cleaned[$cleanKey] = $this->cleanArray($value);
            } elseif (is_string($value)) {
                $cleaned[$cleanKey] = $this->cleanString($value);
            } else {
                $cleaned[$cleanKey] = $value;
            }
        }
        return $cleaned;
    }

    public function stripTags(string $input, array $allowedTags = []): string
    {
        return strip_tags($input, $allowedTags);
    }
}
