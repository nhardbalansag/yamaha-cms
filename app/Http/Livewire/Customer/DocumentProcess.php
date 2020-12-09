<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Documents\CustomersDocument;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class DocumentProcess extends Component
{

    use WithFileUploads;

    public $photo_path, $document_id;

    public $data = [
        'photo_path' => 'required|image|max:1024',
        'document_id' => 'required|numeric'
    ];

    public function render()
    {
        $data['document_category'] = DB::select('select * from document_categories');
        $data['submitted_document'] = DB::select('select * from customers_documents');

        return view('livewire.customer.document-process', $data);
    }

    public function createDocument(){

        $validatedData = $this->validate($this->data);

        $formData = [
            'photo_path' => $this->photo_path->store('photos'),
            'customer_id' => Auth::user()->id,
            'document_id' => $this->document_id,
            'status' => "pending",
        ];

        CustomersDocument::create($formData);

        session()->flash('message', 'Document uploaded successfully');
        return redirect()->to('/my-account/credential/documents/set-up');
    }
}
