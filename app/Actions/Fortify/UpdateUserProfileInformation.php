<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'no_handphone' => ['required', 'numeric', Rule::unique('users')->ignore($user->id)],
            'no_rekening' => ['required', 'numeric', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');
            $user->forceFill([
                'name' => $input['name'],
                'no_handphone' => $input['no_handphone'],
                'no_rekening' => $input['no_rekening'],
            ])->save();
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'no_handphone' => $input['no_handphone'],
            'no_handphone_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
