<?php

namespace App\Http\Livewire\Admin\Customer;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class UpdateOrderStatus extends Component
{

    public $transactionId;

    public function render()
    {
        return view('livewire.admin.customer.update-order-status');
    }

    public function updateOrderStatus()
    {
        $affected = DB::table('transactions')
                    ->where('id', $this->transactionId)
                    ->update(['status' => "deliver"]);

        session()->flash('message', 'status updated');
        return redirect()->to('/orders/viewallOrders/transactions');
    }
}
