<?php

declare(strict_types=1);

namespace SentinelGuard\Contracts;

interface SanitizerInterface
{
    public function cleanString(string $input): string;
    public function cleanArray(array $input): array;
    public function stripTags(string $input, array $allowedTags = []): string;
}


// Strict return types enforced
