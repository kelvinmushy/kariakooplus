<?php
// app/Models/Brand.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];

    public function models()
    {
        return $this->hasMany(Model::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
