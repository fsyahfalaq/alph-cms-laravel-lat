<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = array('category_id', 'author', 'title', 'image', 'short_desc', 'description');

    public function category() {
        return $this->belongsTo('category');
    }
}
