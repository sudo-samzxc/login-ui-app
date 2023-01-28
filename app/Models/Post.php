<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'post_image',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPostImageAttribute($value)
    {
        return asset($value);
    }

    public function setPostImageAttribute($value)
    {
        $this->attributes['post_image'] = asset('storage/' . $value);
    }
}