<?php

namespace App\DTO\Patient;

use Illuminate\Http\Request;

class UpdatePatientDTO {
    public function __construct(
        public string $id,
        public string $name,
        public string $cpf,
        public string|null $medical_record,
        public string|null $referral_slip,
        public string|null $apprentice_id
    ) {}

    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->id,
            $request->name,
            $request->cpf,
            $request->medical_record,
            $request->referral_slip,
            $request->secretarian_id,
            $request->apprentice_id
        );
    }
}