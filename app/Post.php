<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id',
        'cover'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
        
    }

    public function tags() 
    {
        return $this->belongsToMany('App\Tag');
    }

    public function getCoverPathAttribute() 
    {
        return $this->cover ? Storage::url($this->cover) : null;

    }

    public function getDateAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    protected $appends = ['cover_path','date'];
}
