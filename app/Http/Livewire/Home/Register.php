<?php

namespace App\Http\Livewire\Home;
use App\Models\Users\EndUser;
use Illuminate\Support\Facades\Validator;
use Mail;

use Livewire\Component;

class Register extends Component
{
    protected $emailType = "registration";
    public $account_type = "customer";
    public $status = "not confirm";

    public $first_name, $last_name, $middle_name, $email, $home_address, $street_address, $country_region, $contact_number, $city, $state_province, $postal, $password;

    public $data = [
        'first_name' => 'required|max:100', 
        'last_name' => 'required|max:100',
        'middle_name' => 'required|max:100',
        'email' => 'required|max:100|email',
        'home_address' => 'required',
        'street_address' => 'required',
        'country_region' => 'required|max:100',
        'contact_number' => 'required|numeric|min:11',
        'city' => 'required|max:100',
        'state_province' => 'required|max:100',
        'postal' => 'required|min:4|numeric',
        'postal' => 'required|min:4|numeric',
        'status' => 'required',
        'account_type' => 'required',
        'password' => 'required',
    ];

    public function render()
    {
        return view('livewire.home.register');
    }

    public function createEndUserRegistration(){

        $validatedData = $this->validate($this->data);

        EndUser::create($validatedData);

        Mail::send(new \App\Mail\SendInquiry($this->emailType, $validatedData));

        session()->flash('message', ' thank you, we have already sended the verification to your email account.');
        return redirect()->to('/user/register');
    }
}
