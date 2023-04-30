<?php

namespace app\repositories;

use app\forms\FilterForm;
use app\models\Polyclinics;

interface PolyclinicsRepositoryInterface
{
    public function findById(int $id): Polyclinics;

    public function findAll(FilterForm $form): array;

    public function findAllOrderByName(FilterForm $form): array;

    public function create(Polyclinics $polyclinic): Polyclinics;

    public function delete(Polyclinics $polyclinic): void;
}
