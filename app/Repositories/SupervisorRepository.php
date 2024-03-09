<?php

namespace App\Repositories;

use App\Interfaces\SupervisorRepositoryInterface;
use App\DTO\Supervisor\{ CreateSupervisorDTO, UpdateSupervisorDTO };
use App\Models\{ User, Supervisor };
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SupervisorRepository implements SupervisorRepositoryInterface {
    public function __construct(
        private User $user_model,
        private Supervisor $supervisor_model
    ) {}

    public function create(CreateSupervisorDTO $dto): void 
    {
        $user_id = $this->user_model->create([
            'email' => $dto->email,
            'name' => $dto->name,
            'password' => $dto->password
        ])->id;
        $this->supervisor_model->create([
            'id' => $user_id, 
            'specialty' => $dto->specialty,
            'secretarian_id' => Auth::id()
        ]);
    }

    public function update(UpdateSupervisorDTO $dto): bool 
    {
        $user = $this->user_model->find($dto->id);
        $supervisor = $this->supervisor_model->find($user->id);

        if (! $user || ! $supervisor) {
            return false;
        }

        $user->update([
            'email' => $dto->email,
            'name' => $dto->name,
            'password' => $dto->password
        ]);
        $supervisor->update([
            'id' => $user->id,
            'specialty' => $dto->specialty,
            'secretarian_id' => $supervisor->id
        ]);

        return true;
    }
    
    public function delete(string|int $id): bool 
    {
        $supervisor = $this->supervisor_model->find($id);

        if ($supervisor) {
            $supervisor->delete();
            return true;
        }        
        
        return false;
    }

    public function getAll(): array 
    {
        return Supervisor::all()->toArray();
    }

    public function get(string|int $id): array 
    {
        return Supervisor::find($id);
    }
}