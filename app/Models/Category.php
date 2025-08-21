<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name_ar','name_en'];

    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class, 'portfolio_categories');
    }
}
