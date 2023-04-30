<?php

namespace app\repositories;

use app\models\RestApiUser;
use app\models\User;

interface UserRepositoryInterface
{
    public function findOneById(int $id): User;

    public function findByUser(string $user): ?User;

    public function update(User $user): User;

    public function updateRest(RestApiUser $user): RestApiUser;
}
