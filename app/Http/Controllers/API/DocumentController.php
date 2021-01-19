<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Validator,Redirect,Response,File;
use App\Document;

class DocumentController extends Controller
{
    public function viewAllDocumentCategory(Request $request){

        $response = DB::select('SELECT *
                    FROM document_categories');
        $statusCode = 200;

        return response()->json($response , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function sendDocument(Request $request){

        $formData = [
            'photo_path' => $request->wholeDataImage->store('photos'),
            'customer_id' => Auth::user()->id,
            'document_id' => $request->documentId,
            'status' => "pending",
        ];

        $data['validId'] = DB::select('SELECT COUNT(*) as data_count
                                            FROM customers_documents, document_categories
                                            WHERE customers_documents.document_id = ' . $this->document_id . ' and customers_documents.customer_id = ' . Auth::user()->id);

        if($data['validId'][0]->data_count != 0){
            $response = "failed";
        }else{
            CustomersDocument::create($formData);
            $statusCode = 200;
            $response = "success";
        }
       
        return response()->json($response , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
