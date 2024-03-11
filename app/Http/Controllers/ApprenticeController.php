<?php

namespace App\Http\Controllers;

use App\DTO\Apprentice\CreateApprenticeDTO;
use App\DTO\Apprentice\UpdateApprenticeDTO;
use App\Services\ApprenticeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function __construct(
        private ApprenticeService $service
    ) {}

    public function create(Request $request): JsonResponse {
        return $this->service->create(
            CreateApprenticeDTO::makeFromRequest($request)
        );
    }    

    public function update(Request $request): JsonResponse {
        return $this->service->update(
            UpdateApprenticeDTO::makeFromRequest($request)
        );
    }

    public function delete(Request $request): JsonResponse {
        return $this->service->delete($request->id);
    }

    public function getAll(): JsonResponse {
        return $this->service->getAll();
    }

    public function get(Request $request): JsonResponse {
        return $this->service->get($request->id);
    }
}
