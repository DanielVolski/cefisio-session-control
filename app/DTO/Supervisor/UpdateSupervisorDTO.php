<?php

namespace App\DTO\Supervisor;

use Illuminate\Http\Request;

class UpdateSupervisorDTO

 {
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public string $password, 
        public string $specialty,
    ) {}

    public static function makeFromRequest(Request $request): self {
        return new self(
            $request->id,
            $request->name,
            $request->email,
            $request->password, 
            $request->specialty,
            $request->secretarian_id
        );
    }
}