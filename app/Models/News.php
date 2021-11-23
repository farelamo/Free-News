<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];
    protected $table = 'news';
    protected $fillable = [
        'title', 'image', 'content', 
        'like_count', 'is_posted', 'author_id', 
        'category_id' 
    ];
    public $timestamps = false;
}