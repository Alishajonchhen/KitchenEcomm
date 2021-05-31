<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id', 'name', 'status', 'category_code', 'slug'];

    protected $appends = ['image_path'];

    //Image path
    public function getImagePathAttribute()
    {
        return "/lib/Images/categories/";
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
