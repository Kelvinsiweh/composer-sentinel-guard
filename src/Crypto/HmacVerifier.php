<?php

declare(strict_types=1);

namespace SentinelGuard\Crypto;

use SentinelGuard\Contracts\SignatureVerifierInterface;
use InvalidArgumentException;

final class HmacVerifier implements SignatureVerifierInterface
{
    private string $algorithm;

    public function __construct(string $algorithm = 'sha256')
    {
        if (!in_array($algorithm, hash_algos(), true)) {
            throw new InvalidArgumentException("Unsupported cryptographic algorithm: {$algorithm}");
        }
        $this->algorithm = $algorithm;
    }

    public function generateSignature(string $payload, string $secret): string
    {
        if (empty($secret)) {
            throw new InvalidArgumentException("Secret key cannot be empty");
        }
        return hash_hmac($this->algorithm, $payload, $secret);
    }

    public function verifySignature(string $payload, string $signature, string $secret): bool
    {
        $expected = $this->generateSignature($payload, $secret);
        // Constant time comparison to prevent timing attacks
        return hash_equals($expected, $signature);
    }
}

// Hardened constant-time verification
