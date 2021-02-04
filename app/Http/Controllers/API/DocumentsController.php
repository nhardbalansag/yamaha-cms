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
        /////
            // $validator = Validator::make($request->all(),
            // [
            //     'photo_path' => 'required|image',
            //     'document_id' => 'required|numeric'
            // ]);

            // if ($validator->fails()) {
            //     return response()->json(['error'=>$validator->errors()], 401);
            // }

            // if ($request->hasFile('file')) {
            //     foreach ($request->file('file') as $image) {
            //         if ($upload = $image->store('photos')) {
            //             return  response()->json($upload, 201);
            //         }else{
            //             return  response()->json("no", 403);
            //         }
            //     }
            // }else{
            //     return  response()->json($request->hasFile('file'), 403);
            // }
            $samle = $request->file('file')->store('photos');
            return  response()->json( $samle, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

            // if ($files = $request->file('image')) {

                //store file into document folder
                // $file = $request->file->store('photos');

                //store your file into database
                // $formData = [
                //     'photo_path' => $request->file->store('photos'),
                //     'customer_id' => Auth::user()->id,
                //     'document_id' => $request->documentId,
                //     'status' => "pending",
                // ];

                // $data['validId'] = DB::select('SELECT COUNT(*) as data_count
                //                                 FROM customers_documents, document_categories
                //                                 WHERE customers_documents.document_id = ' . $request->documentId . ' and customers_documents.customer_id = ' . Auth::user()->id);

                // if($data['validId'][0]->data_count != 0){
                //     $response = "failed";
                // }else{
                //     CustomersDocument::create($formData);
                    // $statusCode = 200;
                //     $response = "success";

                // }

            // }
        ///

        // return response()->json($file, $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
