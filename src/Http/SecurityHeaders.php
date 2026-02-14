<?php

declare(strict_types=1);

namespace SentinelGuard\Http;

final class SecurityHeaders
{
    /**
     * Returns hardened production default HTTP security headers.
     */
    public static function getDefaults(): array
    {
        return [
            'X-Content-Type-Options' => 'nosniff',
            'X-Frame-Options' => 'DENY',
            'X-XSS-Protection' => '1; mode=block',
            'Referrer-Policy' => 'strict-origin-when-cross-origin',
            'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains; preload',
            'Content-Security-Policy' => "default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline'",
        ];
    }

    public static function apply(array $customHeaders = []): void
    {
        $headers = array_merge(self::getDefaults(), $customHeaders);
        foreach ($headers as $header => $value) {
            header("{$header}: {$value}");
        }
    }
}

// Optimized headers


// Added Permissions-Policy headers
