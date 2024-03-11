<?php

namespace App\DTO\Apprentice;

use Illuminate\Http\Request;

class CreateApprenticeDTO {
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}

    public static function makeFromRequest(Request $request): self {
        return new self(
            $request->name,
            $request->email,
            $request->password
        );
    }
}