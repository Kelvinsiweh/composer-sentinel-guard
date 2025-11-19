<?php
namespace SentinelGuard\Sanitizer;
class EmailSanitizer {
    public static function clean(string $email): string {
        return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    }
}
