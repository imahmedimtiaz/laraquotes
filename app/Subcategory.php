<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function ParentCategory() {
        return $this->belongsTo('App\Category');
      }
}
