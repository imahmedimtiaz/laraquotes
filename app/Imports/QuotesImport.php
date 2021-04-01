<?php

namespace App\Imports;

use App\Quote;
use App\Category;
use App\Subcategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class QuotesImport implements ToModel, WithHeadingRow
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
        $category = Category::where(['name' => $row['type']])->first();

        if($category != null){
            $quote = new Quote;
            $quote->quotation = $row['quotation'];
            $quote->category_id = $category->id;
            if($row['subtype'] != null && $row['subtype'] != ""){
                $subcategory = Subcategory::where(['name' => $row['subtype'], 'category_id' => $category->id])->first();
          
                if( $subcategory != null){
                $quote = new Quote;
                $quote->quotation = $row['quotation'];
                $quote->category_id = $category->id;
                $quote->subcategory_id = $subcategory->id;
                $quote->is_favorite = isset($row['isfavorite']) ? $row['isfavorite'] : 0;
                $quote->save();
                   
                }else{
                    $subcategory = new Subcategory;
                    $subcategory->name = $row['subtype'];
                    $subcategory->category_id = $category->id;
                    $subcategory->save();
    
                $quote = new Quote;
                $quote->quotation = $row['quotation'];
                $quote->category_id = $category->id;
                $quote->subcategory_id = $subcategory->id;
                $quote->is_favorite = isset($row['isfavorite']) ? $row['isfavorite'] : 0;
                $quote->save();
    
                }
            }
            $quote->is_favorite = isset($row['isfavorite']) ? $row['isfavorite'] : 0;
            $quote->save();

          
        }else{
            $category = new Category;
            $category->name = $row['type'];
            $category->save();


            if($row['subtype'] != null && $row['subtype'] != ""){
            $subcategory = Subcategory::where(['name' => $row['subtype'], 'category_id' => $category->id])->first();
      
            if( $subcategory != null){
            $quote = new Quote;
            $quote->quotation = $row['quotation'];
            $quote->category_id = $category->id;
            $quote->$subcategory_id = $subcategory->id;
            $quote->is_favorite = isset($row['isfavorite']) ? $row['isfavorite'] : 0;
            $quote->save();
               
            }else{
                $subcategory = new Subcategory;
                $subcategory->name = $row['subtype'];
                $subcategory->category_id = $category->id;
                $subcategory->save();

            $quote = new Quote;
            $quote->quotation = $row['quotation'];
            $quote->category_id = $category->id;
            $quote->subcategory_id = $subcategory->id;
            $quote->is_favorite = isset($row['isfavorite']) ? $row['isfavorite'] : 0;
            $quote->save();

            }
        }
 

        }
        
    }
}
