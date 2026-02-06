<?php

declare(strict_types=1);

namespace SentinelGuard\Contracts;

interface SignatureVerifierInterface
{
    public function generateSignature(string $payload, string $secret): string;
    public function verifySignature(string $payload, string $signature, string $secret): bool;
}
