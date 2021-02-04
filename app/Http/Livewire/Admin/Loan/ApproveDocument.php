<?php

namespace App\Http\Livewire\Admin\Loan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Mail;

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

        $data = DB::table('users')
                ->where('id', $this->customer_id)
                ->first();

        $email = [
            "first_name" =>  $data->first_name,
            "information" => $data,
            "email" =>   $data->email
        ];

        session()->flash('declineMessage', 'updated successfully');

        Mail::send(new \App\Mail\SendInquiry('document_approve', $email));

        return redirect()->to('/loan/applicants/' . $this->customer_id);
    }
}
