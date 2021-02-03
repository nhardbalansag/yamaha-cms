<?php

namespace App\Http\Livewire\Admin\Loan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ApproveDocument extends Component
{
    public $sentDocsId, $customer_id;

    public function render()
    {
        return view('livewire.admin.loan.approve-document');
    }

    public function approve(){
        $affected = DB::table('customers_documents')
                    ->where('id', $this->sentDocsId)
                    ->update(['status' => "approved"]);

        session()->flash('declineMessage', 'updated successfully');
        return redirect()->to('/loan/applicants/' . $this->customer_id);
    }
}
