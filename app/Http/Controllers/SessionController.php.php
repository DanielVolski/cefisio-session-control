<?php

namespace App\Http\Controllers;

use App\DTO\Session\CreateSessionDTO;
use App\Services\SessionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct(
        private SessionService $service
    ) {}

    public function create(Request $request): JsonResponse {
        return $this->service->create(
            CreateSessionDTO::makeFromRequest($request)
        );
    }

    public function getAll(): JsonResponse {
        return $this->service->getAll();
    }

    public function get(Request $request): JsonResponse {
        return $this->service->get($request->route()->parameters['id']);
    }

    public function getByApprenticeID(Request $request): JsonResponse {
        return $this->getByApprenticeID($request->apprentice_id);
    }
}
