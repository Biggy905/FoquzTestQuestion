<?php

namespace app\services;

use app\components\ParameterBag;
use app\models\RestApiUser;
use app\models\Token;
use app\models\User;
use app\helpers\DateTimeHelpers;
use app\repositories\databases\TokenRepository;
use app\repositories\databases\UserRepository;
use Yii;
use DomainException;
use LogicException;
use Throwable;
use yii\web\NotFoundHttpException;

final class AuthentificationService
{
    public function __construct(
        private readonly ParameterBag $parameterBag,
        private readonly UserRepository $usersRepository,
        private readonly TokenRepository $tokensRepository,
        private readonly JwtService $jwtService,
    ) {

    }

    public function findIdentityByAccessToken(string $token): ?User
    {
        try {
            $data = $this->jwtService->decode($token);

            $id = (string) ($data['id'] ?? '');
            if (!$id) {
                throw new \DomainException('ID не найден');
            }

            $user = $this->usersRepository->findOneById($id);
            if (!$user) {
                throw new DomainException('Пользователь не найден');
            }

            if ($user->status !== User::STATUS_ACTIVE) {
                throw new DomainException('Пользователь не активирован');
            }

            return $user;
        } catch (Throwable) {
            return null;
        }
    }

    /**
     * @throws NotFoundHttpException
     */
    public function findIdentityById(string $id): ?User
    {
        return $this->usersRepository->findOneById($id);
    }

    public function authorizeById(User $user): string
    {
        return $this->authorize($user);
    }

    private function authorize(User $user): string
    {
        $this->loggedAt($user);

        $ttlAccess = $this->parameterBag->get('jwt.expire.access');
        $accessToken = $this->createToken($user, $ttlAccess);

        $ttlRefresh = $this->parameterBag->get('jwt.expire.refresh');
        $refreshToken = $this->createRefreshToken($user, $ttlRefresh);

        $this->setCookie($refreshToken, $ttlRefresh);
        return $refreshToken;
    }

    /**
     * @throws NotFoundHttpException
     */
    public function refresh(string $refreshToken): string
    {
        $ttlAccess = $this->parameterBag->get('jwt.expire.access');
        $ttlRefresh = $this->parameterBag->get('jwt.expire.refresh');
        try {
            $data = $this->jwtService->decode($refreshToken);
            $id = $data['id'];
        } catch (Throwable) {
            throw new DomainException('Не удалось обновить токен', 401);
        }

        $user = $this->usersRepository->findOneById($id);
        if (!$user) {
            throw new DomainException('Пользователь не найден!');
        }

        if ($user->status !== User::STATUS_ACTIVE) {
            throw new DomainException('Пользователь не активирован');
        }

        $this->loggedAt($user);
        $this->removeRefreshToken($refreshToken);

        $accessToken = $this->createToken($user, $ttlAccess);
        $refreshToken = $this->createRefreshToken($user, $ttlRefresh);

        $this->setCookie($refreshToken, $ttlRefresh);

        return $accessToken;
    }

    /**
     * @throws NotFoundHttpException
     */
    public function signOut(string $refreshToken): void
    {
        $this->removeRefreshToken($refreshToken);
        $this->refresh($refreshToken);
        $this->removeCookie();
    }

    private function createToken(User $user, int $ttl): string
    {
        $payload = [
            'id' => $user->id,
            'exp' => time() + $ttl,
        ];

        return $this->jwtService->encode($payload);
    }

    private function createRefreshToken(User $user, int $ttl): string
    {
        $newToken = $this->createToken($user, $ttl);

        $token = new Token();
        $token->id_user = $user->id;
        $token->token = $newToken;
        $this->tokensRepository->create($token);

        $userRestApi = RestApiUser::find()->andWhere(['id' => $user->id])->one();
        $userRestApi->auth_key = $newToken;
        $this->usersRepository->updateRest($userRestApi);

        return $token->token;
    }

    private function removeRefreshToken(string $refreshToken): void
    {
        $token = $this->tokensRepository->findOneByToken($refreshToken);
        if ($token) {
            $this->tokensRepository->delete($token);
        }
    }

    private function setCookie(string $value, int $ttl): void
    {
        $env = $this->parameterBag->get('env');
        $domain = $this->parameterBag->get('jwt.domain');

        $options = [
            'expires' => time() + $ttl,
            'path' => '/',
            'domain' => $domain,
            'secure' => $env !== 'local',
            'httponly' => true,
            'samesite' => 'Strict',
        ];

        $response = setcookie('refresh_token', $value, $options);
        if (!$response) {
            throw new LogicException('Не удалось установить куки');
        }
    }

    private function removeCookie(): void
    {
        $this->setCookie('', -1000);
    }


    private function loggedAt(User $user): void
    {
        $restApiUser = RestApiUser::find()->andWhere(['id' => $user->id])->one();
        $restApiUser->logged_at = DateTimeHelpers::createDateTime();

        $this->usersRepository->updateRest($restApiUser);
    }
}
