<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as OriginalAuth;

class AuthenticatedSessionController extends OriginalAuth
{
    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            // return app(LoginResponse::class);
            return redirect('/');
        });
    }
}
