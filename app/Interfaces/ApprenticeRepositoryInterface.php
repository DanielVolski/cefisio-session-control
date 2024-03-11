<?php

namespace App\Interfaces;

use App\DTO\Apprentice\{ CreateApprenticeDTO, UpdateApprenticeDTO };

interface ApprenticeRepositoryInterface {
    public function create(CreateApprenticeDTO $dto): void;
    public function update(UpdateApprenticeDTO $dto): bool;
    public function delete(string|int $id): bool;
    public function getAll(): array;
    public function get(string|int $id): array|null;
}