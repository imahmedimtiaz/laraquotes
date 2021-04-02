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
        $count =  Quote::count();

         if($number != null && $number != 0){
           
            if($count <= $number){
                return response()->json([
                    'status' => 442,
                    'message' => 'Invalid number'
                  ]);   
            }else{
                $take = $count - $number;
                $quotes = Quote::with('Quotecategory','Quotesubcategory')->skip($number)->take($take)->get();
            }
         
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
