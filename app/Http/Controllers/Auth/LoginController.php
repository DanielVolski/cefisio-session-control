<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails())
            return response(null, 400);
                    
        if ($request->authenticate())
            return response(null, 200);
        else
            return response(null, 404);
    }

    private function validator($data) {
        return Validator::make(
            $data, 
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'required' => 'Attribute :attribute field is required'
            ]
        );
    }
}
