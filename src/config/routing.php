<?php

return [
    [
        'verb' => ['get'],
        'pattern' => '',
        'route' => 'site/index',
    ],
    [
        'verb' => ['post'],
        'pattern' => '/login',
        'route' => 'site/login',
    ],
    [
        'verb' => ['post'],
        'pattern' => '/logout',
        'route' => 'site/logout',
    ],
    // Patients
    [
        'verb' => ['get'],
        'pattern' => '<id>/patients',
        'route' => 'patients/item',
    ],
    [
        'verb' => ['get'],
        'pattern' => 'patients',
        'route' => 'patients/list',
    ],
    [
        'verb' => ['post'],
        'pattern' => 'patients',
        'route' => 'patients/create',
    ],
    [
        'verb' => ['patch'],
        'pattern' => 'patients/<id>/update',
        'route' => 'patients/update',
    ],
    [
        'verb' => ['delete'],
        'pattern' => 'patients/<id>/delete',
        'route' => 'patients/delete',
    ],
    // Polyclinic
    [
        'verb' => ['get'],
        'pattern' => '<id>/polyclinics',
        'route' => 'polyclinics/item',
    ],
    [
        'verb' => ['get'],
        'pattern' => 'polyclinics',
        'route' => 'polyclinics/list',
    ],
    [
        'verb' => ['post'],
        'pattern' => 'polyclinics',
        'route' => 'polyclinics/create',
    ],
    [
        'verb' => ['patch'],
        'pattern' => 'polyclinics/<id>/update',
        'route' => 'polyclinics/update',
    ],
    [
        'verb' => ['delete'],
        'pattern' => 'polyclinics/<id>/delete',
        'route' => 'polyclinics/delete',
    ],
];
