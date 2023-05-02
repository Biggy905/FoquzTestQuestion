<?php

namespace app\repositories\databases;

use app\repositories\TokenRepositoryInterface;
use app\models\Token;
use app\helpers\DateTimeHelpers;
use LogicException;

final class TokenRepository implements  TokenRepositoryInterface
{
    public function findOneByToken(string $refreshToken): ?Token
    {
        return Token::find()->byToken($refreshToken)->one();
    }

    public function create(Token $token): Token
    {
        if (!$token->save()){
            throw new LogicException('Не удалось сохранить');
        }

        return $token;
    }

    public function delete(Token $token): void
    {
        $token->deleted_at = DateTimeHelpers::createDateTime();
        if (!$token->save()) {
            throw new LogicException('Не удалось удалить');
        }
    }
}
