# Sentinel Guard for PHP

[![PHP Version](https://img.shields.io/badge/php-8.1+-blue.svg)](https://www.php.net/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

A standalone, zero-dependency PHP security toolkit providing cryptographically secure HMAC request signing, XSS sanitization, timing-attack-safe token verification, and HTTP security header configuration.

## Capabilities
- **HMAC Signature Verification**: Prevent tampering on webhook and API payloads using SHA-256 / SHA-512.
- **Input Sanitization**: Multi-layer string, array, and HTML tag stripping.
- **Timing Attack Resistance**: Employs `hash_equals` across all secret validations.
- **HTTP Security Headers**: Preset CSP, HSTS, X-Frame-Options configurations.

## Installation
```bash
composer require kelvin/sentinel-guard
```

### Laravel Integration
Register middleware in bootstrap/app.php.

## Contributors

This project is actively developed and maintained by:
- **[Kelvin Fomukong Siweh Nkweche](https://github.com/Kelvinsiweh)**
- **[Ndemafia](https://github.com/ndemafiawilsmith)**

Contributions, issue reports, and suggestions are welcome!

