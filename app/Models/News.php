<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title', 'image', 'content', 
        'like_count', 'is_posted', 'author_id', 
        'category_id' 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
        News::creating(function($model) {
            if (!$model->slug) {
                $hash = dechex(crc32($model->title));
                $model->slug = Str::slug(Str::of($model->title)->substr(0, 64)) . '-' . $hash;
            }
        });
    }
}