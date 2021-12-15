<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function($model) {
            if (!$model->slug) {
                $hash = dechex(crc32($model->name . time()));
                $model->slug = Str::slug(Str::of($model->name)->substr(0, 24)) . '-' . $hash;
            }
        });
    }
}