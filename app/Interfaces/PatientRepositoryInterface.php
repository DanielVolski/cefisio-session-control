<?php

namespace App\Interfaces;

use App\DTO\Patient\{ CreatePatientDTO, UpdatePatientDTO };

interface PatientRepositoryInterface {
    public function create(CreatePatientDTO $dto): void;
    public function update(UpdatePatientDTO $dto): bool;
    public function delete(string|int $id): bool;
    public function getAll(): array;
    public function get(string|int $id): array|null;
}