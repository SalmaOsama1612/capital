<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'client_name_ar','client_name_en','client_image','comment_ar','comment_en','rate'
    ];
}
