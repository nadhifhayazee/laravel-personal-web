<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;

    protected $dates = ['name_field'];

    protected $fillable = [
        
        'post_category_id', 
        'post_title', 'post_author', 'post_date', 'post_image',
        'post_content', 'post_tags'];

    protected $primaryKey = 'post_id';
}
