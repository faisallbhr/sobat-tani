<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'integer', 'unique:users'],
            'profesi' => ['required', 'string'],
            'password' => $this->passwordRules(),
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);

        return User::create([
            'name' => $input['name'],
            'no_hp' => $input['no_hp'],
            'profesi' => $input['profesi'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
