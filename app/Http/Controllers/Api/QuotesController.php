<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Quote;
use App\Subcategory;
class QuotesController extends Controller
{
    public function all()
    {
        $quotes =  Quote::with('Quotecategory','Quotesubcategory')->get();
        return response()->json([
            'data' => $quotes,
            'status' => 200,
            'message' => 'All quotes fetched'
          ]);
    }

}
