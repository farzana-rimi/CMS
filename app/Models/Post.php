<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
