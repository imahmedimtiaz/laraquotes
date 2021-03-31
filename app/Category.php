<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    public function quotes()
    {
        return $this->hasMany('App\Quote', 'category_id', 'id');
    }
    public function Subcategories()
    {
        return $this->hasMany('App\Subcategory', 'category_id', 'id');
    }


}
