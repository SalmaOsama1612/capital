<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PortfolioCategory extends Pivot
{
    protected $table = 'portfolio_categories';
    protected $fillable = ['portfolio_id','category_id'];
}
