<?php

namespace App\Repositories;

use App\Interfaces\SessionRepositoryInterface;
use App\DTO\Session\CreateSessionDTO;
use App\Models\Session;

class SessionRepository implements SessionRepositoryInterface  {
    public function __construct(
        private Session $model
    ) {}

    public function create(CreateSessionDTO $dto): void
    {
        $this->model->create([
            'apprentice_id' => $dto->apprentice_id,
            'patient_id' => $dto->patient_id
        ]);
    }

    public function getAll(): array
    {
        return $this->model->all()->toArray();
    }

    public function get(string|int $id): array
    {
        return $this->model->find($id);
    }

    public function getByApprenticeID(string|int $id): array
    {
        return $this->model->where('apprentice_id', '=', $id)->get();
    }
}