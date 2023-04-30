<?php

namespace app\services;

use app\forms\FilterForm;
use app\forms\IdForm;
use app\groups\PatientItemGroups;
use app\groups\PatientsListGroups;
use app\helpers\DateTimeHelpers;
use app\models\Patient;
use app\repositories\databases\PatientRepository;
use yii\web\BadRequestHttpException;
use Yii;
use yii\web\NotFoundHttpException;

final class PatientsService
{
    public function __construct(
        private readonly PatientRepository $patientRepository,
        private readonly IdForm $idForm,
        private readonly FilterForm $filterForm,
    ) {
    }

    /**
     * @throws NotFoundHttpException
     * @throws BadRequestHttpException
     */
    public function item(int $id): array
    {
        $form = $this->idForm;
        $form->setAttributes(['id' => $id]);
        if (!$form->validate()) {
            throw new BadRequestHttpException();
        }

        $patient = $this->patientRepository->findById($form->id);

        return PatientItemGroups::toArray($patient);
    }

    /**
     * @throws BadRequestHttpException
     */
    public function list(int $page, int $limit): array
    {
        $form = $this->filterForm;
        $form->setAttributes(['id' => $page, 'limit' => $limit]);
        if (!$form->validate()) {
            throw new BadRequestHttpException();
        }

        $patients = $this->patientRepository->findAll($form);

        return PatientsListGroups::toArray($patients);
    }

    /**
     * @throws BadRequestHttpException
     */
    public function save(array $request): array
    {
        $form = new Patient();
        $form->setAttributes($request);
        if (!$form->validate()) {
            throw new BadRequestHttpException();
        }

        $patient = $this->patientRepository->create($form);

        return PatientItemGroups::toArray($patient);
    }

    /**
     * @throws NotFoundHttpException
     * @throws BadRequestHttpException
     */
    public function update(int $id, array $request): array
    {
        $idForm = $this->idForm;
        $idForm->setAttributes(['id' => $id]);
        if (!$idForm->validate()) {
            throw new BadRequestHttpException();
        }

        $form = new Patient();
        $form->setAttributes($request);
        if (!$form->validate()) {
            throw new BadRequestHttpException();
        }

        $patient = $this->patientRepository->findById($idForm->id);
        $patient->name = $form->name ?? $patient->name;
        $patient->birthday = $form->birthday ?? $patient->birthday;
        $patient->phone = $form->phone ?? $patient->phone;
        $patient->address = $form->address ?? $patient->address;
        $patient->polyclinic_id = $form->polyclinic_id ?? $patient->polyclinic_id;
        $patient->treatment_id = $form->treatment_id ?? $patient->treatment_id;
        $patient->status_id = $form->status_id ?? $patient->status_id;
        $patient->updated = DateTimeHelpers::createDateTime();
        $patient->updated_by = Yii::$app->user->identity->id ?? 1;

        $updatePatient = $this->patientRepository->create($patient);

        return PatientItemGroups::toArray($updatePatient);
    }

    public function delete(int $id): void
    {
        $form = $this->idForm;
        $form->setAttributes(['id' => $id]);
        if (!$form->validate()) {
            throw new BadRequestHttpException();
        }

        $patient = $this->patientRepository->findById($form->id);

        $this->patientRepository->delete($patient);
    }
}
