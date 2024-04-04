<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DTO\Patient\CreatePatientDTO;
use App\DTO\Patient\UpdatePatientDTO;
use App\Services\PatientService;
use Illuminate\Http\JsonResponse;

class PatientController extends Controller
{
    public function __construct(
        private PatientService $service
    ) {}

    public function create(Request $request): JsonResponse {
        return $this->service->create(
            CreatePatientDTO::makeFromRequest($request)
        );
    }

    public function update(Request $request): JsonResponse {
        return $this->service->update(
            UpdatePatientDTO::makeFromRequest($request)
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
