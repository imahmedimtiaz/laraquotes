<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
  protected $fillable = ['name','category_id'];
    public function ParentCategory() {
        return $this->belongsTo('App\Category', 'category_id','id');
      }
}
