<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=['id'];

    public function category()
    {
        $this->belongsTo(Category::Class);
    }


}
