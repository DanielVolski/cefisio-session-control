<?php

namespace App\Services;

use App\Repositories\SessionRepository;
use App\DTO\Session\CreateSessionDTO;
use Illuminate\Http\JsonResponse;

class SessionService {
    public function __construct(
        private SessionRepository $repository
    ) {}

    public function create(CreateSessionDTO $dto): JsonResponse {
        return response()->json($this->repository->create($dto), 200);
    }

    public function getAll(): JsonResponse {
        return response()->json($this->repository->getAll(), 200);
    }

    public function get(string|int $id): JsonResponse {
        $session = $this->repository->get($id);
        
        if (! $session) {
            return response()->json([
                'message' => "session ${id} not found"
            ], 404);
        }

        return response()->json([
            $session
        ], 200);
    }

    public function getByApprenticeID(string|int $id): JsonResponse {
        $session = $this->repository->getByApprenticeID($id);

        if (! $session) {
            return response()->json([
                'message' => "session ${id} not found"
            ], 404);
        }

        return response()->json([
            $session
        ], 200);
    }
}