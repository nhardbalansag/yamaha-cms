<?php

namespace App\Http\Livewire\Admin\Loan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DeclineDocument extends Component
{

    public $sentDocsId, $customer_id;

    public function render()
    {
        return view('livewire.admin.loan.decline-document');
    }

    public function decline(){
        $affected = DB::table('customers_documents')
                    ->where('id', $this->sentDocsId)
                    ->update(['status' => "decline"]);

        session()->flash('declineMessage', 'updated successfully');
        return redirect()->to('/loan/applicants/' . $this->customer_id);
    }
}
