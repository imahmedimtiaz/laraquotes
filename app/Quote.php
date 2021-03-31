<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
  protected $fillable = ['quotation','category_id','subcategory_id','	is_favorite'];
  
    public function Quotecategory() {
        return $this->belongsTo('App\Category', 'category_id','id');
      }
      public function Quotesubcategory() {
        return $this->belongsTo('App\Subcategory', 'subcategory_id','id');
      }

    
}
