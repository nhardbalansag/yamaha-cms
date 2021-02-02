<?php

namespace App\Http\Livewire\Admin\Customer;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ViewAllCustomer extends Component
{
    public function render()
    {
        $data['allCustomer'] = DB::table('users')
                                ->paginate(5);

        return view('livewire.admin.customer.view-all-customer', $data);
    }


}
