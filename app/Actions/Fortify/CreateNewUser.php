<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Mail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    protected $emailType = "registration";

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    { 
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'home_address' => ['required', 'string', 'max:255'],
            'street_address' => ['required', 'string', 'max:255'],
            'country_region' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:12'],
            'city' => ['required', 'string', 'max:255'],
            'state_province' => ['required', 'string', 'max:255'],
            'postal' => ['required', 'string', 'max:5'],
            // 'role' => ['string', 'max:255'],
            // 'account_type' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();
            
        Mail::send(new \App\Mail\SendInquiry($this->emailType, $input));

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'middle_name' => $input['middle_name'],
                'home_address' => $input['home_address'],
                'street_address' => $input['street_address'],
                'country_region' => $input['country_region'],
                'contact_number' => $input['contact_number'],
                'city' => $input['city'],
                'verified' => false,
                'state_province' => $input['state_province'],
                'postal' => $input['postal'],
                'role' => $input['url'] == 'http://yamaha-cms.test/register' ? "admin" : "customer",
                // 'account_type' => "admin",
                'email' => $input['email'],     
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
            });

          

        });

        
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
