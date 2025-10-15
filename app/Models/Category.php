<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    //remenber name is unique

    protected $fillable = ['name', 'number_of_blogs'];

}
