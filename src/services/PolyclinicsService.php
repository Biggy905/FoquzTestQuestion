<?php

namespace app\services;

use app\forms\FilterForm;
use app\forms\IdForm;
use app\groups\PolyclinicItemGroups;
use app\groups\PolyclinicListGroups;
use app\models\Polyclinics;
use app\repositories\databases\PolyclinicsRepository;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

final class PolyclinicsService
{
    public function __construct(
        private readonly PolyclinicsRepository $polyclinicsRepository,
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

        $polyclinic = $this->polyclinicsRepository->findById($form->id);

        return PolyclinicItemGroups::toArray($polyclinic);
    }

    public function list(int $page, int $limit): array
    {
        $form = $this->filterForm;
        $form->setAttributes(['id' => $page, 'limit' => $limit]);
        if (!$form->validate()) {
            throw new BadRequestHttpException();
        }

        $polyclinics = $this->polyclinicsRepository->findAll($form);

        return PolyclinicListGroups::toArray($polyclinics);
    }

    /**
     * @throws BadRequestHttpException
     */
    public function save(array $request): array
    {
        $form = new Polyclinics();
        $form->setAttributes($request);
        if (!$form->validate()) {
            throw new BadRequestHttpException();
        }

        $polyclinic = $this->polyclinicsRepository->create($form);

        return PolyclinicItemGroups::toArray($polyclinic);
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

        $form = new Polyclinics();
        $form->setAttributes($request);
        if (!$form->validate()) {
            throw new BadRequestHttpException();
        }
        $polyclinic = $this->polyclinicsRepository->findById($idForm->id);
        $polyclinic->name = $form->name ?? $polyclinic->name;

        $polyclinic = $this->polyclinicsRepository->create($polyclinic);

        return PolyclinicItemGroups::toArray($polyclinic);
    }

    /**
     * @throws BadRequestHttpException
     * @throws NotFoundHttpException
     */
    public function delete(int $id): void
    {
        $form = $this->idForm;
        $form->setAttributes(['id' => $id]);
        if (!$form->validate()) {
            throw new BadRequestHttpException();
        }

        $polyclinic = $this->polyclinicsRepository->findById($form->id);

        $this->polyclinicsRepository->delete($polyclinic);
    }
}
