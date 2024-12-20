<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_One_Project extends Model
{
    use HasFactory;

    public $table = "category_portfolio";

public function portfolio()
{
    return $this->belongsTo(Portfolio::class);
}

public function category()
{
    return $this->belongsTo(Categories::class, 'id');  
}

}
