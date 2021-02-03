<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ResubmitDocument extends Component
{

    use WithFileUploads;

    public $photo_path, $document_id, $percent, $customersDocumentInfo;

    public $data = [
        'photo_path' => 'required|image|max:1024'
    ];
    public function render()
    {

        return view('livewire.customer.resubmit-document');
    }

    public function resubmit()
    {
        $validatedData = $this->validate($this->data);

        $storePhoto = $this->photo_path->store('photos');

        $affected = DB::table('customers_documents')
                        ->where('id',  $this->customersDocumentInfo)
                        ->update(
                            [
                                'status' => 'pending',
                                'photo_path' => $storePhoto
                            ]
                            );

        $affected == true ? session()->flash('message', 'Document updated successfully') : session()->flash('error', 'unable to update document');

        return redirect('/my-account/credential/documents/set-up');

    }

}
