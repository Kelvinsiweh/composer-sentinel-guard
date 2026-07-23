<?php

declare(strict_types=1);

namespace SentinelGuard\Tests;

use PHPUnit\Framework\TestCase;
use SentinelGuard\Sanitizer\InputSanitizer;

final class SanitizerTest extends TestCase
{
    private InputSanitizer $sanitizer;

    protected function setUp(): void
    {
        $this->sanitizer = new InputSanitizer();
    }

    public function testSanitizesMaliciousStrings(): void
    {
        $malicious = "<script>alert('xss');</script>";
        $cleaned = $this->sanitizer->cleanString($malicious);
        $this->assertStringNotContainsString('<script>', $cleaned);
        $this->assertSame('&lt;script&gt;alert(&#039;xss&#039;);&lt;/script&gt;', $cleaned);
    }

    public function testCleansRecursiveArrays(): void
    {
        $input = [
            'title' => '<b>Important</b>',
            'nested' => [
                'comment' => "<img src=x onerror=alert(1)>"
            ]
        ];
        $cleaned = $this->sanitizer->cleanArray($input);
        $this->assertSame('&lt;b&gt;Important&lt;/b&gt;', $cleaned['title']);
    }
}

// Nested XSS tests
