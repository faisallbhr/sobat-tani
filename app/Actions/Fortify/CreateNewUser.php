<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    protected function buruhTani(User $user){
        $user->assignRole('buruh tani');
    }
    protected function petani(User $user){
        $user->assignRole('petani');
    }

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
            'profesi' => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();

        $role = $input['profesi'];

        if($role==='buruh tani'){
            return DB::transaction(function () use ($input) {
                return tap(User::create([
                    'name' => $input['name'],
                    'no_hp' => $input['no_hp'],
                    'password' => Hash::make($input['password']),
                ]), function (User $user) {
                    $this->buruhTani($user);
                });
            });
        }else{
            return DB::transaction(function () use ($input) {
                return tap(User::create([
                    'name' => $input['name'],
                    'no_hp' => $input['no_hp'],
                    'password' => Hash::make($input['password']),
                ]), function (User $user) {
                    $this->petani($user);
                });
            });
        }
        
    }
}
