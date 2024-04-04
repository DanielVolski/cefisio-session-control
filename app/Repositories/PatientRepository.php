<?php

namespace App\Repositories;

use App\Interfaces\PatientRepositoryInterface;
use App\DTO\Patient\{ CreatePatientDTO, UpdatePatientDTO };
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class PatientRepository implements PatientRepositoryInterface {
    public function __construct(
        private Patient $model
    ) {}

    public function create(CreatePatientDTO $dto): void
    {
        $this->model->create([
            'name' => $dto->name,
            'cpf' => $dto->cpf,
            'medical_record' => $dto->medical_record,
            'referral_slip' => $dto->referral_slip,
            'secretarian_id' => Auth::id(),
            'apprentice_id' => $dto->apprentice_id,
        ]);
    }

    public function update(UpdatePatientDTO $dto): bool
    {
        $patient = $this->model->find($dto->id);

        if (! $patient) {
            return false;
        }

        $this->model->create([
            'name' => $dto->name,
            'cpf' => $dto->cpf,
            'medical_record' => $dto->medical_record,
            'referral_slip' => $dto->referral_slip,
            'secretarian_id' => $patient->secretarian_id,
            'apprentice_id' => $dto->apprentice_id,
        ]);

        return true;
    }

    public function delete(string|int $id): bool
    {
        $patient = $this->model->find($id);

        if ($patient) {
            $patient->delete();
            return true;
        }

        return false;
    }

    public function getAll(): array
    {
        return $this->model->all()->toArray();
    }

    public function get(string|int $id): array|null
    {
        return $this->model->find($id);
    }
}