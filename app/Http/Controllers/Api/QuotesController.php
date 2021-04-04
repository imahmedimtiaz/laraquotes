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
        $take = 0;

         if($number != null && $number != 0){
           
            if($count < $number){
                return response()->json([
                    'status' => 442,
                    'message' => 'Records to skip number is greater than total count of DB records.'
                  ]);   
            }else{
                $take = $count - $number;
                $quotes = Quote::with('Quotecategory','Quotesubcategory')->skip($number)->take($take)->get();
            }
         
         }else{
            $quotes =  Quote::with('Quotecategory','Quotesubcategory')->get();
         }
        
        return response()->json([
        	'status' => 200,
            'message' => 'Success',
        	'total_records' => $count,
            'records_to_skip' => $number,
            'after_skip' => $take,
            'data' => $quotes,
            
          ]);
    }

}
