<?php

namespace app\repositories;

use app\forms\FilterForm;
use app\models\Patient;

interface PatientRepositoryInterface
{
    public function findById(int $id): Patient;

    public function findAll(FilterForm $form): array;

    public function create(Patient $patient): Patient;

    public function delete(Patient $patient): void;
}
