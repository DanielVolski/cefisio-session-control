<?php

namespace App\DTO\Supervisor;

use Illuminate\Http\Request;

class CreateSupervisorDTO {
    public function __construct(
        public string $name,
        public string $email,
        public string $password, 
        public string $specialty,
    ) {}

    public static function makeFromRequest(Request $request): self {
        return new self(
            $request->name,
            $request->email,
            $request->password,
            $request->specialty,
        );
    }
}