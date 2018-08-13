<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
   
    public $timestamps = false;

    protected $fillable = [
        'admin_name', 
        'admin_password'];
}