<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Laravel\Fortify\Fortify;
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
        // dd()
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'no_handphone' => ['required', 'integer', 'unique:users'],
            'no_rekening' => ['required', 'integer', 'unique:users'],
            'gender_id' => ['required'],
            'profesi' => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();

        $role = $input['profesi'];

        if($role==='buruh tani'){
            return DB::transaction(function () use ($input) {
                return tap(User::create([
                    'name' => $input['name'],
                    'no_handphone' => $input['no_handphone'],
                    'no_rekening' => $input['no_rekening'],
                    'gender_id' => $input['gender_id'],
                    'password' => Hash::make($input['password']),
                ]), 
                function (User $user) {
                    $this->buruhTani($user);
                    return redirect()->intended(Fortify::redirects('login'))->with('success', 'ssssss');
                });
            });
        }else{
            return DB::transaction(function () use ($input) {
                return tap(User::create([
                    'name' => $input['name'],
                    'no_handphone' => $input['no_handphone'],
                    'no_rekening' => $input['no_rekening'],
                    'gender_id' => $input['gender_id'],
                    'password' => Hash::make($input['password']),
                ]), 
                function (User $user) {
                    $this->petani($user);
                });
            });
        }
        
    }
}
