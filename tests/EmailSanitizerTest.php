<?php
use PHPUnit\Framework\TestCase;
use SentinelGuard\Sanitizer\EmailSanitizer;
class EmailSanitizerTest extends TestCase {
    public function testSanitizesEmail(): void {
        $this->assertSame('user@test.com', EmailSanitizer::clean('  user@test.com\n'));
    }
}
