<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function viewAllDocumentCategory(Request $request){

        $response = DB::select('SELECT *
                    FROM document_categories');
        $statusCode = 200;

        return response()->json($response , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
