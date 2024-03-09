<?php

namespace App\Services;

use App\DTO\Supervisor\{ CreateSupervisorDTO, UpdateSupervisorDTO };
use App\Repositories\SupervisorRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SupervisorService {
    public function __construct(
        private SupervisorRepository $repository
    ) {}

    public function create(CreateSupervisorDTO $dto): JsonResponse {
        return response()->json($this->repository->create($dto), 200);
    }

    public function update(UpdateSupervisorDTO $dto): JsonResponse {
        $id = $dto->id;
        if (! $this->repository->update($dto)) {
            return response()->json([
                'message' => "supervisor ${id} not found",
            ], 404);
        }

        return response()->json([
            'message' => "supervisor ${id} updated"
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
        $supervisor = $this->repository->get($id);
        
        if (! $supervisor) {
            return response()->json([
                'message' => "supervisor ${id} not found"
            ], 404);
        }

        return response()->json([
            $supervisor
        ], 200);
    } 
}