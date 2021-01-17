<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }
    public function Subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }


}
