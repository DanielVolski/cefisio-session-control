<?php

class CreateSessionDTO {
    public function __construct(
        public int $apprentice_id,
        public int $patient_id,
    ) {}

    public static function makeFromRequest(Request $request): self 
    {
        return new self(
            $request->apprentice_id,
            $request->patient_id
        );
    }
}