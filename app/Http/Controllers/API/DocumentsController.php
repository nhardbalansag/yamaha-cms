<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Documents\CustomersDocument;
use Livewire\WithFileUploads;

use Validator,Redirect,Response,File;
use App\Document;

class DocumentsController extends Controller
{
     public function viewAllDocumentCategory(){

        $response = DB::table('document_categories')->get();

        $statusCode = 200;

        return response()->json($response , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function sendDocument(Request $request){

        $formData = [
            'photo_path' => $request->file('file')->store('photos'),
            'customer_id' => Auth::user()->id,
            'document_id' => $request->file('docId'),
            'status' => "pending",
        ];

         $data['validId'] = DB::table('customers_documents')
                            ->where('document_id', $request->DocumentId)
                            ->where('customer_id', Auth::user()->id)
                            ->count();

        if($data['validId'] != 0){
           $response = "you had already submitted this type of document";
        }else{
            CustomersDocument::create($formData);
            $response = "Document uploaded successfully";
        }

        return  response()->json($response, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

    }
}
