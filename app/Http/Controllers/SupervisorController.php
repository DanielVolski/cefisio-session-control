<?php

namespace App\Http\Controllers;

use App\DTO\Supervisor\{ CreateSupervisorDTO, UpdateSupervisorDTO };
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SupervisorService;
use Illuminate\Http\JsonResponse;

class SupervisorController extends Controller
{
    public function __construct(
        private SupervisorService $service
    ) {}

    public function create(Request $request): JsonResponse {
        return $this->service->create(
            CreateSupervisorDTO::makeFromRequest($request)
        );
    }

    public function update(Request $request): JsonResponse {
        return $this->service->update(
            UpdateSupervisorDTO::makeFromRequest($request)
        );
    }

    public function delete(Request $request): JsonResponse {
        return $this->service->delete($request->route()->parameters['id']);
    }

    public function getAll(): JsonResponse {
        return $this->service->getAll();
    }

    public function get(Request $request): JsonResponse {
        return $this->service->get($request->route()->parameters['id']);
    }
}
