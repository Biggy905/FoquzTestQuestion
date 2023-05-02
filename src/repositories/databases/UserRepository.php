<?php

namespace app\repositories\databases;

use app\models\RestApiUser;
use app\models\User;
use app\repositories\UserRepositoryInterface;
use yii\web\NotFoundHttpException;
use LogicException;

final class UserRepository implements UserRepositoryInterface
{
    public function findOneById(int $id): User
    {
        $user = User::find()->byId($id)->one();
        if (!$user) {
            throw new NotFoundHttpException('Пользователь не найден');
        }

        return $user;
    }

    public function findByUser(string $user): ?User
    {
        $user = User::find()->byUser($user)->one();
        if (!$user) {
            throw new NotFoundHttpException('Пользователь не найден');
        }

        return $user;
    }

    public function update(User $user): User
    {
        if (!$user->save()){
            throw new LogicException('Не удалось обновить!');
        }

        return $user;
    }

    public function updateRest(RestApiUser $user): RestApiUser
    {
        if (!$user->save()){
            throw new LogicException('Не удалось обновить!');
        }

        return $user;
    }
}
