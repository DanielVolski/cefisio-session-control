<?php

namespace App\DTO\Apprentice;

use Illuminate\Http\Request;

class UpdateApprenticeDTO {
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public string $password
    ) {}

    public static function makeFromRequest(Request $request): self {
        return new self(
            $request->id,
            $request->name,
            $request->email,
            $request->password,
        );
    }
}