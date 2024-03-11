<?php

namespace App\Services;

use App\DTO\Apprentice\{ CreateApprenticeDTO, UpdateApprenticeDTO };
use App\Repositories\ApprenticeRepository;
use Illuminate\Http\JsonResponse;

class ApprenticeService {
    public function __construct(
        private ApprenticeRepository $repository,
    ) {}

    public function create(CreateApprenticeDTO $dto): JsonResponse {
        return response()->json($this->repository->create($dto), 200);
    }

    public function update(UpdateApprenticeDTO $dto): JsonResponse {
        $id = $dto->id;
        if (! $this->repository->update($dto)) {
            return response()->json([
                'message' => "apprentice ${id} not found",
            ], 404);
        }

        return response()->json([
            'message' => "apprentice ${id} updated"
        ], 204);
    }
    
    public function delete(string|int $id): JsonResponse {
        if (! $this->repository->delete($id)) {
            return response()->json([
                'message' => "supervisor ${id} not found"
            ], 404);
        }
        
        return response()->json([
            'message' => "supervisor ${id} deleted"
        ], 204);
    }

    public function getAll(): JsonResponse {
        return response()->json($this->repository->getAll(), 200);
    }

    public function get(string|int $id): JsonResponse {
        $apprentice = $this->repository->get($id);
        
        if (! $apprentice) {
            return response()->json([
                'message' => "apprentice ${id} not found"
            ], 404);
        }

        return response()->json([
            $apprentice
        ], 200);
    }
}