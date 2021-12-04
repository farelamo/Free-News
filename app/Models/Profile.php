<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    protected $fillable = ['name', 'username', 'bio'];

    public function users(){
        return $this->hasOne("App\Models\User", "profile_id");
    }
}