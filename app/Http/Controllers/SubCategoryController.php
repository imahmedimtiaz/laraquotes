<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
class SubCategoryController extends Controller
{
    public function get_subcategories_by_category(Request $request)
    {
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        return $subcategories;
    }
}
