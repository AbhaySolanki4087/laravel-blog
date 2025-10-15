<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    // If you don’t have created_at / updated_at columns:
    // public $timestamps = false;

    // If your table name is not “blogs”, specify it:
    protected $table = 'blogs';
    protected $fillable = ['title','content','category', 'image'];
    
}
