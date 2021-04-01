<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Quote;
use App\Subcategory;
class QuotesController extends Controller
{
    public function all(Request $request)
    {
        $number = $request->number;
         if($number != null && $number != ""){
            $count =  Quote::count();
            $take = $count - $number;
            $quotes = Quote::with('Quotecategory','Quotesubcategory')->skip($number)->take($take)->get();
         }else{
            $quotes =  Quote::with('Quotecategory','Quotesubcategory')->get();
         }
        
        return response()->json([
            'data' => $quotes,
            'status' => 200,
            'message' => 'All quotes fetched'
          ]);
    }

}
