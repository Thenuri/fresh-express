<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Carbon;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:10', 'max:10','regex:/^\d+$/'],
            'address' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date', function($attribute, $value, $invalid) {
                if (!strtotime($value)) {
                    $invalid('Invalid date format');
                } else {
                    $dob = Carbon::parse($value);
                    $now = Carbon::now();
                    if ($dob->diffInYears($now) <= 18) {
                        $invalid('You must be older than 18 years old to register.');
                    }
                }
            }],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'role_id'=>$input['role_id'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'dob' => $input['dob'],
            'password' => Hash::make($input['password']),
            
        ]);
    }
}
