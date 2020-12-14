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

    public $photo_path, $document_id, $percent;

    public $data = [
        'photo_path' => 'required|image|max:1024',
        'document_id' => 'required|numeric'
    ];

    public function render()
    {
        $data['tosubmitDocument'] = $this->rederDocuments();

        $data['approval_percent'] = DB::select('SELECT COUNT(*) as data_count
                                        FROM customers_documents
                                        WHERE customers_documents.status = "approved" and customers_documents.customer_id = ' . Auth::user()->id);

        $data['approval_result'] = round(($data['approval_percent'][0]->data_count / 4) * 100);
        $data['document_category'] = DB::select('select * from document_categories');
        $data['submitted_document'] = DB::select('SELECT
                                                    customers_documents.photo_path as file_path,
                                                    customers_documents.status as file_status,
                                                    document_categories.title as document_title,
                                                    customers_documents.id as doc_id

                                                    FROM customers_documents, document_categories
                                                    WHERE customers_documents.document_id = document_categories.id and customers_documents.customer_id = ' . Auth::user()->id);
        $data['percent'] = $this->percent;

        // dd($data['passingDocs']);
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

        $data['validId'] = DB::select('SELECT COUNT(*) as data_count
                                            FROM customers_documents, document_categories
                                            WHERE customers_documents.document_id = ' . $this->document_id . ' and customers_documents.customer_id = ' . Auth::user()->id);

        if($data['validId'][0]->data_count != 0){
            session()->flash('error', 'you had already submitted this type of document');
        }else{
            CustomersDocument::create($formData);

            session()->flash('message', 'Document uploaded successfully');
            return redirect()->to('/my-account/credential/documents/set-up');
        }

    }

    public function countDocumentThatPass(){

        $data = DB::select('SELECT
                                document_categories.title as documentTitle,
                                document_categories.id as documentId

                            FROM customers_documents, document_categories
                            WHERE NOT EXISTS
                            (select customers_documents.document_id
                                from customers_documents
                                    where (customers_documents.document_id = document_categories.id) and customers_documents.customer_id = ' . Auth::user()->id. ')
                            GROUP BY
                                document_categories.id,
                                document_categories.title');
        return $data;
    }

    public function rederDocuments(){

        if(empty($this->countDocumentThatPass())){

            $data = DB::select('SELECT
                                    document_categories.title as documentTitle,
                                    document_categories.id as documentId
                                FROM document_categories');
        }else{
            $data = $this->countDocumentThatPass();
        }

        return $data;
    }



}
