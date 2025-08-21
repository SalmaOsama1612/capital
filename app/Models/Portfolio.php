<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';
    protected $fillable = ['company_name_ar','company_name_en','description_ar','description_en'];

    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'portfolio_categories');
    }
}
