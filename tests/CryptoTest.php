<?php

declare(strict_types=1);

namespace SentinelGuard\Tests;

use PHPUnit\Framework\TestCase;
use SentinelGuard\Crypto\HmacVerifier;

final class CryptoTest extends TestCase
{
    public function testHmacGenerationAndVerification(): void
    {
        $verifier = new HmacVerifier('sha256');
        $secret = 'super-secret-key-123';
        $payload = json_encode(['event' => 'order.created', 'id' => 9928]);

        $sig = $verifier->generateSignature($payload, $secret);
        $this->assertNotEmpty($sig);
        $this->assertTrue($verifier->verifySignature($payload, $sig, $secret));
        $this->assertFalse($verifier->verifySignature($payload, 'invalid-signature', $secret));
    }
}
