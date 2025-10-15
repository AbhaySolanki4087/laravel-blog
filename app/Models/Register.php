<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    //
    protected $table = 'users'; // Ensure this matches your migration
    protected $fillable = ['name', 'email', 'password', 'role']; 
}
