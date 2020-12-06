<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\Admin\Products\Product;
use App\Models\Users\Inquiry;
use Illuminate\Support\Facades\DB;
use Mail;

class Inquire extends Component
{   
    protected $emailType = "inquiry";
    
    public $productId, $first_name, $last_name, $middle_name, $email_address, $home_address, $street_address, $country_region, $contact_number, $city, $state_province, $postal;

    public $data = [
        'first_name' => 'required|max:100', 
        'last_name' => 'required|max:100',
        'middle_name' => 'required|max:100',
        'email_address' => 'required|max:100|email',
        'home_address' => 'required',
        'street_address' => 'required',
        'country_region' => 'required|max:100',
        'contact_number' => 'required|numeric|min:11',
        'city' => 'required|max:100',
        'state_province' => 'required|max:100',
        'postal' => 'required|min:4|numeric',
        'productId' => 'required|numeric',
        'g-recaptcha-response' => 'required'
    ];

    public function messages()
    {
        return [
       'required' => 'The :attribute field is required.',
       'email' => 'The :attribute must use a valid email address',
       'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
       'g-recaptcha-response.required' => 'Please complete the captcha'
       ];
    }



    public function render(){

        $data['product'] = Product::where('id', $this->productId)->first();

        

        return view('livewire.home.inquire', $data);
    }// end of function


    public function createInquiry(){

        $validatedData = $this->validate($this->data);
        Inquiry::create($validatedData);

        $productData['allusersData'] =  $validatedData;
        $productData['product'] = Product::where('id', $this->productId)->first();
        $productData['specification'] = DB::select('
            SELECT product_specifications.title as title, product_specifications.description as description
            FROM product_specifications, products
            WHERE (product_specifications.status = "publish") AND (product_specifications.product_id = ' .$this->productId . ')
            GROUP BY product_specifications.title, product_specifications.description');

        Mail::send(new \App\Mail\SendInquiry($this->emailType, $productData));

        session()->flash('message', 'your inquiry sends succesfully');
        return redirect()->to('/home/product/' . $this->productId . '/inquiry');
    }
}
