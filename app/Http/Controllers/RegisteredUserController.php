<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Http\Controllers\RegisteredUserController as OriginalRegisteredUserController;

class RegisteredUserController extends OriginalRegisteredUserController
{
    public function store(Request $request,
                          CreatesNewUsers $creator): RegisterResponse
    {
        event(new Registered($user = $creator->create($request->all())));

        redirect('/login');
        
        return app(RegisterResponse::class);
    }
}
