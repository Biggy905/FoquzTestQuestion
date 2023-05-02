<?php

namespace app\services;

use app\forms\AuthForm;
use app\models\User;
use app\repositories\databases\UserRepository;
use DomainException;

final class UserService
{
    public function __construct(
        private readonly UserRepository $repository,
        private readonly AuthentificationService $authentificationService,
        private readonly AuthForm $authForm,
    ) {
    }

    public function signUser(array $request): string
    {
        $form = $this->authForm;
        $form->setAttributes($request);
        if (!$form->validate()) {
            throw new DomainException('Не верный логин/пароль');
        }

        $user = $this->repository->findByUser($form->username);
        if (!$user){
            throw new DomainException('Пользователь не найден!');
        }

        if ($user->status !== User::STATUS_ACTIVE) {
            throw new DomainException('Пользователь не активирован!');
        }

        return $this->authentificationService->authorizeById($user);
    }

    public function logoutUser(string $token): void
    {
        $token = trim(str_replace('Bearer', '', $token));

        $this->authentificationService->signOut($token);
    }
}
