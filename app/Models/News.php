<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;    
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function($model) {
            if (!$model->slug) {
                $hash = dechex(crc32($model->title));
                $model->slug = Str::slug(Str::of($model->title)->substr(0, 64)) . '-' . $hash;
            }
        });
    }
}