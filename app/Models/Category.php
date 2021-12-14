<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'description'];

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    protected static function boot()
    {
        parent::boot();
        News::creating(function($model) {
            if (!$model->slug) {
                $hash = dechex(crc32($model->name . time()));
                $model->slug = Str::slug(Str::of($model->name)->substr(0, 24)) . '-' . $hash;
            }
        });
    }
}