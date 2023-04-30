<?php

return [
    \app\components\ParameterBag::class => static function () {
        return new \app\components\ParameterBag(
            [
                'jwt' => [
                    'domain' => getenv('JWT_DOMAIN') ?? '',
                    'key' => getenv('JWT_KEY') ?? '',
                    'expire' => [
                        'access' => (int)(getenv('JWT_EXPIRE_ACCESS') ?? 0),
                        'refresh' => (int)(getenv('JWT_EXPIRE_REFRESH') ?? 0),
                    ],
                    'algorithm' => getenv('JWT_ALGORITHM') ?? 'HS256',
                ],
            ]
        );
    },

    \app\forms\IdForm::class => \app\forms\IdForm::class,
    \app\forms\FilterForm::class => \app\forms\FilterForm::class,

    \app\repositories\UserRepositoryInterface::class => \app\repositories\databases\UserRepository::class,
    \app\repositories\TokenRepositoryInterface::class => \app\repositories\databases\TokenRepository::class,
    \app\repositories\FormDiseasesRepositoryInterface::class => \app\repositories\databases\FormDiseasesRepository::class,
    \app\repositories\PatientRepositoryInterface::class => \app\repositories\databases\PatientRepository::class,
    \app\repositories\PolyclinicsRepositoryInterface::class => \app\repositories\databases\PolyclinicsRepository::class,
    \app\repositories\StatusesRepositoryInterface::class => \app\repositories\databases\StatusesRepository::class,
    \app\repositories\TreatmentsRepositoryInterface::class => \app\repositories\databases\TreatmentsRepository::class,

    \app\services\AuthentificationService::class => \app\services\AuthentificationService::class,
    \app\services\JwtService::class => \app\services\JwtService::class,
    \app\services\PatientsService::class => \app\services\PatientsService::class,
    \app\services\PolyclinicsService::class => \app\services\PolyclinicsService::class,
    \app\services\UserService::class => \app\services\UserService::class,
];
