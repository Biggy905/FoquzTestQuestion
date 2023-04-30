<?php

namespace app\services;

use app\components\ParameterBag;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

final class JwtService
{
    private string $key;

    private string $algorithm;

    public function __construct(
        private readonly ParameterBag $parameterBag,
    ) {
        $this->key = (string) $this->parameterBag->get('jwt.key');
        $this->algorithm = (string) $this->parameterBag->get('jwt.algorithm');
    }

    public function encode(array $payload): string
    {
        return JWT::encode($payload, $this->key, $this->algorithm);
    }

    public function decode(string $token): array
    {
        $data = JWT::decode($token, new Key($this->key, $this->algorithm));

        return (array) $data;
    }
}
