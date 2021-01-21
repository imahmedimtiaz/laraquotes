<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    public function Quotecategory() {
        return $this->belongsTo('App\Category', 'category_id','id');
      }
      public function Quotesubcategory() {
        return $this->belongsTo('App\Subcategory', 'subcategory_id','id');
      }

    
}
