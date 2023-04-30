<?php

namespace app\repositories;

use app\models\Token;

interface TokenRepositoryInterface
{
    public function findOneByToken(string $refreshToken): ?Token;

    public function create(Token $token): Token;

    public function delete(Token $token): void;
}
