<?php

namespace App\Repositories;

use App\Interfaces\ApprenticeRepositoryInterface;
use App\DTO\Apprentice\{ CreateApprenticeDTO, UpdateApprenticeDTO };
use App\Models\{ Apprentice, User };
use Illuminate\Support\Facades\Auth;

class ApprenticeRepository implements ApprenticeRepositoryInterface {
    public function __construct(
        private User $user_model,
        private Apprentice $apprentice_model
    ) {}

    public function create(CreateApprenticeDTO $dto): void
    {
        $user_id = $this->user_model->create([
            'email' => $dto->email,
            'name' => $dto->name,
            'password' => $dto->password
        ])->id;
        $this->apprentice_model->create([
            'id' => $user_id,
            'supervisor_id' => Auth::id()
        ]);
    }

    public function update(UpdateApprenticeDTO $dto): bool
    {
        $user = $this->user_model->find($dto->id);
        $apprentice = $this->apprentice_model->find($user->id);

        if (! $user || ! $apprentice) {
            return false;
        }

        $user->update([
            'email' => $dto->email,
            'name' => $dto->name,
            'password' => $dto->password
        ]);
        $apprentice = $this->apprentice_model->update([
            'id' => $user->id,
            'supervisor_id' => $apprentice->supervisor_id
        ]);

        return true;
    }

    public function delete(string|int $id): bool
    {
        $apprentice = $this->apprentice_model->find($id);

        if ($apprentice) {
            $apprentice->delete();
            return true;
        }

        return false;
    }

    public function getAll(): array
    {
        return $this->apprentice_model->all()->toArray();
    }

    public function get(string|int $id): array|null 
    {
        return $this->apprentice_model->find($id);
    }
}