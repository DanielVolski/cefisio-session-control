<?php

namespace App\Services;

use App\DTO\Patient\{ CreatePatientDTO, UpdatePatientDTO };
use App\Repositories\PatientRepository;
use Illuminate\Http\JsonResponse;

class PatientService {
    public function __construct(
        private PatientRepository $repository,
    ) {}

    public function create(CreatePatientDTO $dto): JsonResponse {
        return response()->json($this->repository->create($dto), 200);
    }

    public function update(UpdatePatientDTO $dto): JsonResponse {
        $id = $dto->id;
        if (! $this->repository->update($dto)) {
            return response()->json([
                'message' => "patient ${id} not found",
            ], 404);
        }

        return response()->json([
            'message' => "patient ${id} updated"
        ], 204);
    }
    
    public function delete(string|int $id): JsonResponse {
        if (! $this->repository->delete($id)) {
            return response()->json([
                'message' => "patient ${id} not found"
            ], 404);
        }
        
        return response()->json([
            'message' => "patient ${id} deleted"
        ], 204);
    }

    public function getAll(): JsonResponse {
        return response()->json($this->repository->getAll(), 200);
    }

    public function get(string|int $id): JsonResponse {
        $apprentice = $this->repository->get($id);
        
        if (! $apprentice) {
            return response()->json([
                'message' => "patient ${id} not found"
            ], 404);
        }

        return response()->json([
            $apprentice
        ], 200);
    }
}