<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    public $table = "portfolio";

    // In Portfolio.php
public function categoryOneProjects()
{
    return $this->hasMany(Category_One_Project::class, 'portfolio_id');
}


public function categories() {
    return $this->belongsToMany(Categories::class, 'category_portfolio', 'portfolio_id', 'category_id')
                ->withTimestamps(); // This tells Eloquent to manage the timestamps in pivot table
}


}
