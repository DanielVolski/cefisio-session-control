<?php

namespace App\Interfaces;

use App\DTO\Session\CreateSessionDTO;

interface SessionRepositoryInterface {
    public function create(CreateSessionDTO $dto): void;
    public function getAll(): array; 
    public function get(string|int $id): array;
    public function getByApprenticeID(string|int $id): array;
}