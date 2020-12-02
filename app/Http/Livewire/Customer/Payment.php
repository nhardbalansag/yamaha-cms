<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Users\CustomerOrder;

class Payment extends Component
{
    public $data, $payment_method;

    public function render()
    {
        return view('livewire.customer.payment', $this->data);
    }

    public function checkout(){
        
        $query = [
            'first_name' => $this->data['account']['first_name'],
            'last_name' => $this->data['account']['last_name'],
            'email'=> $this->data['account']['email'],
            'home_address' =>   $this->data['account']['home_address']  . 
                                $this->data['account']['street_address'] .  
                                $this->data['account']['city'] .
                                $this->data['account']['country_region'],
                                $this->data['account']['postal'],
            'contact_number' => $this->data['account']['contact_number'],
            'status' => "pending", 
            'customerId' => $this->data['account']['id'],
            'product_price' => $this->data['product']['price'],
            'productId' => $this->data['product']['id'],
            'payment_method' => $this->payment_method,
            'postal' => $this->data['account']['postal'],
        ];

        CustomerOrder::create($query);
       
        session()->flash('message', 'order placed succesfully');
    }
}
