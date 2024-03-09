<?php

namespace App\Interfaces;

use Illuminate\Http\Response;
use App\DTO\Supervisor\{ CreateSupervisorDTO, UpdateSupervisorDTO };
use App\Models\Supervisor;

interface SupervisorRepositoryInterface {
    public function create(CreateSupervisorDTO $dto): void;
    public function update(UpdateSupervisorDTO $dto): bool;
    public function delete(string|int $id): bool;
    public function getAll(): array;
    public function get(string|int $id): array;
}