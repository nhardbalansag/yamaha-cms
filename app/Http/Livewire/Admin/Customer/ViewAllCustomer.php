<?php

namespace App\Http\Livewire\Admin\Customer;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ViewAllCustomer extends Component
{
    public function render()
    {
        $data['allCustomer'] = DB::select('SELECT *
                                            FROM users
                                            WHERE role = "customer"');
        
        return view('livewire.admin.customer.view-all-customer', $data);
    }

    
}
