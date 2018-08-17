<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'cat_id', 
        'cat_title'];

    protected $primaryKey = 'cat_id';
}
