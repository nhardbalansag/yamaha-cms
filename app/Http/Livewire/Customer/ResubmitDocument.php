<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ResubmitDocument extends Component
{

    use WithFileUploads;

    public $photo_path, $document_id, $percent;

    public $data = [
        'photo_path' => 'required|image|max:1024',
        'document_id' => 'required|numeric'
    ];
    public function render()
    {

        return view('livewire.customer.resubmit-document');
    }

    public function resubmit()
    {
        session()->flash('message', 'Document uploaded successfully');
        return view('livewire.customer.resubmit-document');
    }

}
