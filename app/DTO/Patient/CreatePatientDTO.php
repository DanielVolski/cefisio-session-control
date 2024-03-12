<?php

namespace App\DTO\Patient;

use Illuminate\Http\Request;

class CreatePatientDTO {
    public function __construct(
        private string $name,
        private string $cpf,
        private string $medical_record,
        private string $referal_slip,
        private string $secretarian_id,
        private string $apprentice_id
    ) {}

    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->name,
            $request->cpf,
            $request->medical_record,
            $request->referal_slip,
            $request->secretarian_id,
            $request->apprentice_id
        );
    }
}